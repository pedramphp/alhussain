<?php 

	class Event extends SiteObject {
		
		private static $EVENTS_QUERY = "
			SELECT E.`title`,
				   E.`sub_title` AS subTitle,
				   E.`image`,
				   E.`image_title` AS imageTitle,
				   E.`more_info` AS moreInfo,
				   E.`id` AS eventId,
				   E.`address`,
				   E.`event_start_date`,
				   E.`event_end_date`,
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
			$activeRecod['eventFriendlyDate']  = $this->getEventFriendlyDate($activeRecod);

			$activeRecod['image'] = UrlModule::$EVENT_IMAGE_PATH . $activeRecod['image'];
			$activeRecod['subTitle'] = $activeRecod['sub_title'];
			$activeRecod['moreInfo'] = $activeRecod['more_info'];
			$activeRecod['imageTitle'] = $activeRecod['image_title'];
			$activeRecod['telephone'] = $this->formatPhone( $activeRecod['telephone'] );
			
			$this->results['activeRecord'] = $activeRecod;
			
			$result = DatabaseStatic::Query(self::$EVENTS_QUERY);
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['entryDate'] = date('F jS, Y',strtotime($row['entryDate']));
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=events&eventId=' . $row['eventId']; 
				$row['type'] = 'normal';
				$row['image'] = UrlModule::$EVENT_IMAGE_PATH . $row['image'];
				$row['active'] = $row['eventId'] == $activeEventId;
				$row['eventFriendlyDate']  = $this->getEventFriendlyDate($row);
				
				$this->results['records'][] = $row;
			}
			
		}
		
		
		private function getEventFriendlyDate( $record ){
			if(	$record['event_start_date'] != $record['event_end_date'] && 
				date('F',strtotime($record['event_start_date'])) == date('F',strtotime($record['event_end_date']))){
				
					return date('F j-',strtotime($record['event_start_date'])) . date('jS Y',strtotime($record['event_end_date'])); 
			
			}else{ return date('F jS, Y',strtotime($record['event_start_date'])); }
		}
		
		
	    function formatPhone($phone){
	    	
	       if (empty($phone)) return "";
	        if (strlen($phone) == 7)
	                sscanf($phone, "%3s%4s", $prefix, $exchange);
	        else if (strlen($phone) == 10)
	                sscanf($phone, "%3s%3s%4s", $area, $prefix, $exchange);
	        else if (strlen($phone) > 10)
	                sscanf($phone, "%3s%3s%4s%s", $area, $prefix, $exchange, $extension);
	        else
	                return "unknown phone format: $phone";
	        $out = "";
	        $out .= isset($area) ? '(' . $area . ') ' : "";
	        $out .= $prefix . '-' . $exchange;
	        $out .= isset($extension) ? ' x' . $extension : "";
	        return $out;
		    	
	    }
		
	}


?>