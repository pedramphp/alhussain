<?php 

class Event extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	
	private static $MANAGE_EVENTS_SQL = "
		SELECT E.`id` AS eventId,
			   E.`title`,
			   E.`status`,
			   E.`sub_title` AS subTitle,
			   E.`entry_date`
		FROM events AS E
		ORDER BY E.`entry_date` DESC
	";
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			$this->manageEvents();
		}else{
			$types= array('edit','delete','add');
			if( empty($request['type']) || !in_array($request['type'],$types)){
				
				Redirect::Action("404");
				return; 
			}
			switch($request['type']){
				case "add":
					$this->addEvent();
					break;
				case "edit":
					if( !isset($request['eventId']) || !Request::isNumeric($request['eventId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->editEvent($request['eventId']);
					break;
				case "delete":
					if( !isset($request['eventId']) || !Request::isNumeric($request['eventId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->deleteEvent($request['eventId']);
					break;
					
			}
			
		}
		
	}
	
	private function manageEvents(){
		
		$result = DatabaseStatic::Query(self::$MANAGE_EVENTS_SQL);
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted an event';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added an event';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited an event';
					break;	
				case "error":
					$this->results['errorMsg'] = self::$SQL_ERROR;
					break;
				case "not_found":
					$this->results['errorMsg'] = 'This record was not found in our databse';
					break;
					
			}
		}
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['date'] = date('F jS, Y',strtotime($row['entry_date']));
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=event&eventId=' . $row['eventId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=event&eventId=' . $row['eventId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=event&eventId=' . $row['eventId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function editEvent(){
		
		$request = LiteFrame::FetchPostVariable();
    	if(!isset($request['eventTitle'],
    			 $request['eventSubTitle'],
    			 $request['eventImage'],
    			 $request['eventMoreInfo'],
    			 $request['eventStatus'],
    			 $request['eventImageTitle'],
    			 $request['eventId']
    	)){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
			$this->results['eventId'] = $getRequest['eventId'];
			$this->results['authors'] = Authors::getAuthors();
    		$newsRecord = DatabaseStatic::$ah->LoadId_events($getRequest['eventId']);
    		
    		if(empty($newsRecord)){
    			Redirect::Action("event",array("status"=>'not_found'));
				return;
    		}else{
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['eventTitle'] =  $newsRecord->title;
				$record['eventSubTitle'] =  $newsRecord->sub_title;
				$record['eventImage'] =  $newsRecord->image;
				$record['eventMoreInfo'] =  $newsRecord->more_info;
				$record['eventStatus'] = $newsRecord->status;
				$record['eventImageTitle'] = $newsRecord->image_title;
				
    		}
    	}else{ // UPDATING
    		$request['eventTitle'] = trim($request['eventTitle']);
    		$request['eventSubTitle'] = trim($request['eventSubTitle']);
    		$request['eventImage'] = trim($request['eventImage']);
    		$request['eventMoreInfo'] = trim($request['eventMoreInfo']);
    		$request['eventImageTitle'] = trim($request['eventImageTitle']);
    		
			if( !empty($request['eventTitle']) && 
				!empty($request['eventSubTitle']) &&
				!empty($request['eventImage']) &&
				!empty($request['eventMoreInfo']) &&
				!empty($request['eventImageTitle']) &&
				Request::isNumeric($request['eventId'])
			){
				$eventRecord = DatabaseStatic::$ah->LoadId_events($request['eventId']);
				if(!empty($eventRecord)){
						$eventRecord->title = $request['eventTitle'];
						$eventRecord->sub_title = $request['eventSubTitle'];
						$eventRecord->status = $request['eventStatus'];
						$eventRecord->image = $request['eventImage'];
						$eventRecord->image_title = $request['eventImageTitle'];
						$eventRecord->more_info = $request['eventMoreInfo'];
						$eventRecord->updated_date = date("y-m-d : H:i:s", time()); 
						
						if($eventRecord->Save()){
							Redirect::Action("event",array("status"=>'edit'));
						}else{
							$this->results['errorMsg'] = self::$SQL_ERROR;
						}
				
				}else{
					Redirect::Action("event",array("status"=>'not_found'));
					return;
				}
			}else{
				$this->results['errorMsg'] = 'Warning: Please fill all the text fields to edit this event';
				return;
			}
    	}				
	}
	
	

	private function addEvent(){
		
		$this->results['authors'] = Authors::getAuthors();
		$request = LiteFrame::FetchPostVariable();
    	if(isset($request['eventTitle'],
    			 $request['eventSubTitle'],
    			 $request['eventImage'],
    			 $request['eventMoreInfo'],
    			 $request['eventStatus'],
    			 $request['eventImageTitle']
    			 
    	)){
    		$request['eventTitle'] = trim($request['eventTitle']);
    		$request['eventSubTitle'] = trim($request['eventSubTitle']);
    		$request['eventImage'] = trim($request['eventImage']);
    		$request['eventMoreInfo'] = trim($request['eventMoreInfo']);
    		$request['eventImageTitle'] = trim($request['eventImageTitle']);
			if( !empty($request['eventTitle']) && 
				!empty($request['eventSubTitle']) &&
				!empty($request['eventImage']) &&
				!empty($request['eventMoreInfo']) &&
				!empty($request['eventStatus']) &&
				!empty($request['eventImageTitle'])
			){
				$eventRecord = DatabaseStatic::$ah->Create_events();
				$eventRecord->title = $request['eventTitle'];
				$eventRecord->sub_title = $request['eventSubTitle'];
				$eventRecord->status = $request['eventStatus'];
				$eventRecord->image = $request['eventImage'];
				$eventRecord->image_title = $request['eventImageTitle'];
				$eventRecord->more_info = $request['eventMoreInfo'];
				$eventRecord->entry_date = date("y-m-d H:i:s", time()); 
				$eventRecord->updated_date = date("y-m-d : H:i:s", time()); 

				if($eventRecord->Save()){
					Redirect::Action("event",array("status"=>'add'));
				}else{
					$this->results['errorMsg'] = self::$SQL_ERROR;
				}
			}else{
				$this->results['errorMsg'] = 'Warning: Please fill all the text fields';
				return;
			}
    	}		
    			
	}
	
	
	private function deleteEvent($eventId){
		
		$record = DatabaseStatic::$ah->LoadId_events($eventId);
		if(!empty($record)){
			$delete = $record->Delete();
			if($delete){Redirect::Action("event",array("status"=>'delete'));	}
			else{Redirect::Action("event",array("status"=>'error'));}
		}else{
			Redirect::Action("404");
		}
		
	}
	
}
?>