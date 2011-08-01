<?php 

class VideoCategory extends SiteObject{
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('videoCategoryTitle',
											'videoCategoryStatus',
											'videoCategoryDescription');
	
	private static $REQUIRED_EDIT_FIELDS = array('videoCategoryTitle',
												'videoCategoryDescription',
												'videoCategoryStatus',
												'videoCategoryId');
	
	private static $NON_EMPTY_FIELDS = array('videoCategoryTitle',
											 'videoCategoryStatus');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('videoCategoryTitle',
											 		'videoCategoryStatus',
													'videoCategoryId');
	
	public function __construct(){
			parent::__construct();
	}
	

	
	private static $MANAGE_VIDEO_CATEGORIES_SQL = "
		SELECT IC.`id` AS videoCategoryId,
			   IC.`title`,
			   IC.`status`,
			   IC.`description`,
			   IC.`entry_date` AS entryDate,
			   IF(I.`id` IS NULL,0,COUNT(*)) AS size
			   
		FROM videos_category AS IC
		LEFT JOIN videos AS I ON ( I.`video_category_id` = IC.`id` AND I.`status` = 'active')
		WHERE	IC.`status` <> 'delete'
		GROUP BY IC.`id`
		ORDER BY IC.`entry_date` DESC
	";
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			$this->manageVideoCategories();
			return;
			
		}
		$types= array('edit','delete','add');
		if( empty($request['type']) || !in_array($request['type'],$types)){
			
			Redirect::Action("404");
			return; 
		}
		switch($request['type']){
			case "add":
				$this->addVideoCategory();
				break;
			case "edit":
				if( !isset($request['videoCategoryId']) || !Request::isNumeric($request['videoCategoryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->editVideoCategory($request['videoCategoryId']);
				break;
			case "delete":
				if( !isset($request['videoCategoryId']) || !Request::isNumeric($request['videoCategoryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->deleteVideoCategory($request['videoCategoryId']);
				break;
				
		}
			
		
		
	}
	
	
	private function manageVideoCategories(){
		
		$result = DatabaseStatic::Query(self::$MANAGE_VIDEO_CATEGORIES_SQL);
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted a video category';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added a video category';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited a video category';
					break;	
				case "error":
					$this->results['errorMsg'] = self::$SQL_ERROR;
					break;
				case "not_found":
					$this->results['errorMsg'] = 'This record was not found in our database';
					break;
					
			}
		}
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['entryDate'] = ModuleHelper::getFriendlyDate($row['entryDate']);
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=videocategory&videoCategoryId=' . $row['videoCategoryId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=videocategory&videoCategoryId=' . $row['videoCategoryId'].'&type=delete'; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=videoGallery'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function addVideoCategory(){		
			
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST')){			
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST')){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}

			$videoCategoryRecord = DatabaseStatic::$ah->Create_videos_category();
			$videoCategoryRecord->title = $request['videoCategoryTitle'];
			$videoCategoryRecord->status = $request['videoCategoryStatus'];
			$videoCategoryRecord->description = $request['videoCategoryDescription'];
			$videoCategoryRecord->entry_date = ModuleHelper::getCurrentSqlDate(); 
			$videoCategoryRecord->updated_date = ModuleHelper::getCurrentSqlDate();  

			if($videoCategoryRecord->Save()){
				Redirect::Action("videocategory",array("status"=>'add'));
			}else{
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
    	}    				
	}
	
	private function setUnEditedRecords(){
		
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['videoCategoryTitle'] =  $request['videoCategoryTitle'];
    	$record['videoCategoryDescription'] =  $request['videoCategoryDescription'];
    	$record['videoCategoryStatus'] = $request['videoCategoryStatus'];
		$record['videoCategoryId'] = $request['videoCategoryId'];

	}
	
	private function editVideoCategory(){

		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
			$this->results['authors'] = Authors::getAuthors();
    		$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($getRequest['videoCategoryId']);

    		if(empty($videoCategoryRecord)){
    			Redirect::Action("videocategory",array("status"=>'not_found'));
				return;
    		}else{
    		
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['videoCategoryTitle'] =  $videoCategoryRecord->title;
    			$record['videoCategoryDescription'] =  $videoCategoryRecord->description;
    			$record['videoCategoryId'] =  $videoCategoryRecord->id;
    			$record['videoCategoryStatus'] = $videoCategoryRecord->status;
				$record['videoCategoryEntryDate'] = ModuleHelper::getFormatedDate( $videoCategoryRecord->entry_date );

    		}
    	}else{ // UPDATING
			$request = Request::trimAllRequest('POST');
			if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
				!Request::isNumeric($request['videoCategoryId'])){
				$this->setUnEditedRecords();
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;
			}
				
			$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($request['videoCategoryId']);
			if(!empty($videoCategoryRecord)){
					$videoCategoryRecord->title = $request['videoCategoryTitle'];
					$videoCategoryRecord->description = $request['videoCategoryDescription'];
					$videoCategoryRecord->status = $request['videoCategoryStatus'];
					$videoCategoryRecord->updated_date = ModuleHelper::getCurrentSqlDate();
					if($videoCategoryRecord->Save()){
						Redirect::Action("videocategory",array("status"=>'edit'));
					}else{
						$this->setUnEditedRecords();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
			
			}else{
				Redirect::Action("videocategory",array("status"=>'not_found'));
				return;
			}
			
    	}				
    			
	}
	
	
	private function deleteVideoCategory($videoCategoryId){

		$record = DatabaseStatic::$ah->LoadId_videos_category($videoCategoryId);
		$record->status = 'delete';
		if(!empty($record)){
			$delete = $record->Save();
			if($delete){Redirect::Action("videocategory",array("status"=>'delete'));	}
			else{Redirect::Action("videocategory",array("status"=>'error'));}
		}else{
			Redirect::Action("404");
		}
	}
	
}
?>
