<?php 

	class Event extends SiteObject {
		
		private static $EVENTS_QUERY = "
			SELECT E.`title`,
				   E.`sub_title` AS subTitle,
				   E.`image`,
				   E.`image_title` AS imageTitle,
				   E.`more_info` AS moreInfo,
				   E.`id` AS eventId,
				   E.`entry_date` AS entryDate
			FROM events AS E
			WHERE E.`status` = 'active'
			ORDER BY E.`entry_date` DESC
		";
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$request = LiteFrame::FetchGetVariable();
			if( isset($request['eventId'])){
				if(!Request::isNumeric($request['eventId'])){ 
					Redirect::Action("404");
					return; 
				}
				$eventId = htmlspecialchars(trim($request['eventId']));
				$eventRecord = DatabaseStatic::$ah->LoadSingle_events(array('conditions'=>"id=".$eventId." and status='active'"));
				if(empty($eventRecord)){
					Redirect::Action("404"); 
					return; 
				}	
				
			}else{
				$eventRecord = DatabaseStatic::$ah->LoadSingle_events(array('conditions'=>"status='active'",
																	 	    'order'=>'entry_date DESC'));
			}
			$activeEventId = $eventRecord->id;
			$activeRecod = $eventRecord->ToArray();
			$activeRecod['entryDate'] = date('F jS, Y',strtotime($activeRecod['entry_date']));
			$activeRecod['image'] = UrlModule::$EVENT_IMAGE_PATH . $activeRecod['image'];
			$activeRecod['subTitle'] = $activeRecod['sub_title'];
			$activeRecod['moreInfo'] = $activeRecod['more_info'];
			$activeRecod['imageTitle'] = $activeRecod['image_title'];
			$this->results['activeRecord'] = $activeRecod;
			
			$result = DatabaseStatic::Query(self::$EVENTS_QUERY);
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['entryDate'] = date('F jS, Y',strtotime($row['entryDate']));
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=events&eventId=' . $row['eventId']; 
				$row['type'] = 'normal';
				$row['image'] = UrlModule::$EVENT_IMAGE_PATH . $row['image'];
				$row['active'] = $row['eventId'] == $activeEventId;
				$this->results['records'][] = $row;
			}
			
		}
		
	}


?>