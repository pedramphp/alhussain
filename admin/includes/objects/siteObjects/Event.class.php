<?php 

class Event extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('eventTitle',
											'eventSubTitle',
											'eventImage',
											'eventMoreInfo',
											'eventStatus',
											'eventImageTitle',
											'eventAddress',
											'eventTel',
											'eventEndDate',
											'eventStartDate');
	
	private static $REQUIRED_EDIT_FIELDS = array('eventTitle',
											'eventSubTitle',
											'eventImage',
											'eventMoreInfo',
											'eventStatus',
											'eventImageTitle',
											'eventAddress',
											'eventTel',
											'eventEndDate',
											'eventStartDate',
											'eventId');
	
	private static $NON_EMPTY_FIELDS = array('eventTitle',
											'eventStatus',
											'eventAddress',
											'eventEndDate',
											'eventStartDate');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('eventTitle',
												'eventStatus',
												'eventAddress',
												'eventEndDate',
												'eventStartDate',
												'eventId');
	
	private static $MANAGE_EVENTS_SQL = "
		SELECT E.`id` AS eventId,
			   E.`title`,
			   E.`status`,
			   E.`sub_title` AS subTitle,
			   E.`entry_date`,
			   E.`event_start_date` AS eventStartDate,
			   E.`event_end_date` AS eventEndDate
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
	
	private function getEventFriendlyDate( $startDate, $endDate ){
		if(	$startDate != $endDate && 
			date('F',strtotime($startDate)) == date('F',strtotime($endDate))){
			
				return date('F j-',strtotime($startDate)) . date('jS Y',strtotime($endDate)); 
		
		}else{ return date('F jS, Y',strtotime($startDate)); }
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
			$row['entryDate'] = date('F jS, Y',strtotime($row['entry_date']));
			$row['eventFriendlyDate'] = ModuleHelper::getMonthFriendlyDate($row['eventStartDate'],$row['eventEndDate']);
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=events&eventId=' . $row['eventId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=event&eventId=' . $row['eventId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=event&eventId=' . $row['eventId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function setUnEditedRecords(){
		
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['eventTitle'] =  $request['eventTitle'];
    	$record['eventAddress'] =  $request['eventAddress'];
    	$record['eventTel'] = $request['eventTel'];
		$record['eventSubTitle'] =  $request['eventSubTitle'];
		$record['eventImage'] =  $request['eventImage'];
		$record['eventMoreInfo'] =  $request['eventMoreInfo'];
		$record['eventStatus'] = $request['eventStatus'];
		$record['eventImageTitle'] = $request['eventImageTitle'];
		$record['eventStartDate'] = $request['eventStartDate'];
		$record['eventEndDate'] = $request['eventEndDate'];
		$record['eventId'] = $request['eventId'];
		
	}
	
	
	private function editEvent(){
		
		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
			$this->results['eventId'] = $getRequest['eventId'];
			$this->results['authors'] = Authors::getAuthors();
    		$eventsRecord = DatabaseStatic::$ah->LoadId_events($getRequest['eventId']);
    		
    		if(empty($eventsRecord)){
    			Redirect::Action("event",array("status"=>'not_found'));
				return;
    		}else{
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['eventTitle'] =  $eventsRecord->title;
    			$record['eventAddress'] =  $eventsRecord->address;
    			$record['eventTel'] =  ModuleHelper::formatPhone($eventsRecord->telephone);
				$record['eventSubTitle'] =  $eventsRecord->sub_title;
				$record['eventImage'] =  $eventsRecord->image;
				$record['eventMoreInfo'] =  $eventsRecord->more_info;
				$record['eventStatus'] = $eventsRecord->status;
				$record['eventImageTitle'] = $eventsRecord->image_title;
				$record['eventStartDate'] = ModuleHelper::getFormatedDate( $eventsRecord->event_start_date );
				$record['eventEndDate'] = ModuleHelper::getFormatedDate( $eventsRecord->event_end_date );

    		}
    	}else{ // UPDATING
			$request = Request::trimAllRequest('POST');
			if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
				!Request::isNumeric($request['eventId'])){
				$this->setUnEditedRecords();
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;
			}
				
			$eventRecord = DatabaseStatic::$ah->LoadId_events($request['eventId']);
			if(!empty($eventRecord)){
					$eventRecord->title = $request['eventTitle'];
					$eventRecord->sub_title = $request['eventSubTitle'];
					$eventRecord->status = $request['eventStatus'];
					$eventRecord->image = $request['eventImage'];
					$eventRecord->image_title = $request['eventImageTitle'];
					$eventRecord->more_info = $request['eventMoreInfo'];
					$eventRecord->event_start_date =  ModuleHelper::getSqlDate( $request['eventStartDate'] );
					$eventRecord->event_end_date = ModuleHelper::getSqlDate( $request['eventEndDate'] );
					$eventRecord->updated_date = date("y-m-d : H:i:s", time());
					$eventRecord->address = $request['eventAddress'];
					$eventRecord->telephone = ModuleHelper::stripNonNumeric( $request['eventTel'] ); 
					
					if($eventRecord->Save()){
						Redirect::Action("event",array("status"=>'edit'));
					}else{
						$this->setUnEditedRecords();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
			
			}else{
				Redirect::Action("event",array("status"=>'not_found'));
				return;
			}
			
    	}				
	}
	
	

	private function addEvent(){
		
		$this->results['authors'] = Authors::getAuthors();
			
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST')){			
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST')){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}

			$eventRecord = DatabaseStatic::$ah->Create_events();
			$eventRecord->title = $request['eventTitle'];
			$eventRecord->sub_title = $request['eventSubTitle'];
			$eventRecord->status = $request['eventStatus'];
			$eventRecord->image = $request['eventImage'];
			$eventRecord->image_title = $request['eventImageTitle'];
			$eventRecord->address = $request['eventAddress'];
			$eventRecord->telephone = ModuleHelper::stripNonNumeric( $request['eventTel'] );
			$eventRecord->more_info = $request['eventMoreInfo'];
			$eventRecord->event_start_date =  ModuleHelper::getSqlDate( $request['eventStartDate'] );
			$eventRecord->event_end_date = ModuleHelper::getSqlDate( $request['eventEndDate'] );
			$eventRecord->entry_date = ModuleHelper::getCurrentSqlDate(); 
			$eventRecord->updated_date = ModuleHelper::getCurrentSqlDate();  

			if($eventRecord->Save()){
				Redirect::Action("event",array("status"=>'add'));
			}else{
				$this->results['errorMsg'] = self::$SQL_ERROR;
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
