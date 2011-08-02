<?php 

class VideoGallery extends SiteObject{
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('videoGalleryTitle',
											'videoGalleryStatus',
											'videoCategoryId',
											'videoGalleryDescription',
											'videoGalleryVideoId');
	
	private static $REQUIRED_EDIT_FIELDS = array('videoGalleryTitle',
												 'videoGalleryDescription',
												 'videoGalleryStatus',
												 'videoGalleryId',
												 'videoCategoryId',
												 'videoGalleryVideoId');
	
	private static $NON_EMPTY_FIELDS = array('videoGalleryTitle',
											 'videoGalleryStatus',
											 'videoGalleryVideoId');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('videoGalleryTitle',
											 	  'videoGalleryStatus',
												  'videoGalleryId',
												  'videoGalleryVideoId');
	
	public function __construct(){
			parent::__construct();
	}
	

	
	private static $MANAGE_VIDEO_GALLERY_SQL = "
		SELECT V.`id` AS videoGalleryId,
			   V.`title`,
			   V.`status`,
			   V.`description`,
			   V.`entry_date` AS entryDate,
			   V.`video_url` AS videoId,
			   V.`image_thumb_url` AS videoThumbUrl,
			   VC.`title` AS videoCategoryTitle
			      
		FROM videos AS V
		JOIN videos_category AS VC ON(V.`video_category_id` = VC.`id` AND VC.`status` <> 'delete')
		WHERE	V.`status` <> 'delete'
		AND 	VC.`id` = %d
		GROUP BY videoGalleryId
		ORDER BY V.`entry_date` DESC
	";
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			if(isset($request['videoCategoryId']) && Request::isNumeric($request['videoCategoryId']) ){
				$this->managevideoGallery();
				return;
			}else{ // we need to change this in the future
				Redirect::Action("404");
				return; 				
			}
		}
		$types= array('edit','delete','add');
		if( empty($request['type']) || 
			!in_array($request['type'],$types) || 
			!isset($request['videoCategoryId']) || 
			!Request::isNumeric($request['videoCategoryId'])){
			
				Redirect::Action("404");
			return; 
		}
		switch($request['type']){
			case "add":
				$this->addVideoGallery();
				break;
			case "edit":
				if( !isset($request['videoGalleryId']) || !Request::isNumeric($request['videoGalleryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->editVideoGallery($request['videoGalleryId']);
				break;
			case "delete":
				if( !isset($request['videoGalleryId']) || !Request::isNumeric($request['videoGalleryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->deleteVideoGallery($request['videoGalleryId']);
				break;
				
		}
	}
	
	
	private function manageVideoGallery(){
		$request = LiteFrame::FetchGetVariable();
		$result = DatabaseStatic::Query(sprintf(self::$MANAGE_VIDEO_GALLERY_SQL,$request['videoCategoryId']));
		$this->results['records'] = array();
		
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted an video';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added an video';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited an video';
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
			$row['videoId'] = $row['videoId'];
			$row['videoUrl'] = UrlModule::buildVimeoURL( $row['videoId'] );
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoGalleryId=' . $row['videoGalleryId'].'&type=edit&videoCategoryId='.$request['videoCategoryId']; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoGalleryId=' . $row['videoGalleryId'].'&type=delete&videoCategoryId='.$request['videoCategoryId']; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=video&catId='.$request['videoCategoryId']; 
			$this->results['records'][] = $row;
		}
		$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($request['videoCategoryId']);
		$this->results['videoCategoryTitle'] = $videoCategoryRecord->title;
		$this->results['videoCategoryLink'] = LiteFrame::GetApplicationPath() . '?action=videocategory';
		
		$this->results['addVideo']= LiteFrame::GetApplicationPath() . '?action=videogallery&type=add&videoCategoryId='.$request['videoCategoryId']; 
			
	}
	
	
	private function addVideoGallery(){		
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST')){			
		   	
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST') || 
				!Request::isNumeric($request['videoCategoryId']) || 
				!Request::isNumeric($request['videoGalleryVideoId'])){
					
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				$this->setNeccessaryFields();
				return;				
			}
			$videoGalleryRecord = DatabaseStatic::$ah->Create_videos();
			$videoGalleryRecord->title = $request['videoGalleryTitle'];
			$videoGalleryRecord->video_category_id = $request['videoCategoryId'];
			$videoGalleryRecord->status = $request['videoGalleryStatus'];
			$videoGalleryRecord->description = $request['videoGalleryDescription'];
			$videoGalleryRecord->entry_date = ModuleHelper::getCurrentSqlDate(); 
			$videoGalleryRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
			$videoGalleryRecord->video_url = $request['videoGalleryVideoId'];
			$videoGalleryRecord->image_thumb_url = VimeoModule::getMediumThumbnailUrl($request['videoGalleryVideoId']);

			if($videoGalleryRecord->Save()){
				Redirect::Action("videogallery",array("status"=>'add','videoCategoryId'=>$request['videoCategoryId']));
			}else{
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
    	}else{
			$this->setNeccessaryFields();
    	}    					
	}
	
	private function setNeccessaryFields(){
    		$request = LiteFrame::FetchGetVariable();
    		$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($request['videoCategoryId']);
    		$this->results['record'] = array();
			$record = &$this->results['record'];
    		$record['videoCategoryId'] =  $videoCategoryRecord->id;
    		$record['videoCategoryTitle'] = $videoCategoryRecord->title;
    		$record['formUrl'] = LiteFrame::GetApplicationPath() . '?action=videogallery&type=add&videoCategoryId='.$videoCategoryRecord->id; 
    		$record['videoGalleryLink'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoCategoryId=' . $videoCategoryRecord->id;		
	}
	
	private function setUnEditedRecords(){
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['videoGalleryTitle'] =  $request['videoGalleryTitle'];
    	$record['videoGalleryDescription'] =  $request['videoGalleryDescription'];
    	$record['videoGalleryStatus'] = $request['videoGalleryStatus'];
		$record['videoGalleryId'] = $request['videoGalleryId'];
    	$record['videoCategoryId'] = $request['videoCategoryId'];
    	$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($request['videoCategoryId']);
    	$record['videoCategoryTitle'] =  $videoCategoryRecord->title;
    	$record['formUrl'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoGalleryId='.$record['videoGalleryId'].'&type=edit&videoCategoryId='.$record['videoCategoryId'];
		$record['videoGalleryLink'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoCategoryId=' . $record['videoCategoryId'];
		$record['videoGalleryVideoId']  = $request['videoGalleryVideoId'];
	}
	
	private function editVideoGallery(){

		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
    		$videoGalleryRecord = DatabaseStatic::$ah->LoadId_videos($getRequest['videoGalleryId']);
    		
			$videoCategoryRecord = DatabaseStatic::$ah->LoadId_videos_category($getRequest['videoCategoryId']);
    		
			if(empty($videoGalleryRecord) || empty($videoCategoryRecord)){
    			Redirect::Action("videogallery",array("status"=>'not_found','videoCategoryId'=>$getRequest['videoCategoryId']));
				return;
    		}else{
    		
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['videoGalleryTitle'] =  $videoGalleryRecord->title;
    			$record['videoCategoryId'] =  $videoCategoryRecord->id;
    			$record['videoGalleryDescription'] =  $videoGalleryRecord->description;
    			$record['videoGalleryId'] =  $videoGalleryRecord->id;
    			$record['videoGalleryStatus'] = $videoGalleryRecord->status;
				$record['videoCategoryTitle'] = $videoCategoryRecord->title;
				$record['videoGalleryLink'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoCategoryId=' . $videoCategoryRecord->id;
				$record['formUrl'] = LiteFrame::GetApplicationPath() . '?action=videogallery&videoGalleryId='.$videoGalleryRecord->id.'&type=edit&videoCategoryId='.$videoCategoryRecord->id; 
				$record['videoGalleryVideoId']  =  $videoGalleryRecord->video_url;
				$record['videoGalleryImageThumbUrl'] = $videoGalleryRecord->image_thumb_url;
				
    		}
    		return;
    	}

    	// UPDATING
		$request = Request::trimAllRequest('POST');
		if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
			!Request::isNumeric($request['videoGalleryId']) ||
			!Request::isNumeric($request['videoCategoryId']) ||
			!Request::isNumeric($request['videoGalleryVideoId'])
						
		){
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
			return;
		}
		
		$videoGalleryRecord = DatabaseStatic::$ah->LoadSingle_videos(array("conditions" => array("id"=>$request['videoGalleryId'],
																								"video_category_id"=>$request['videoCategoryId'])));
		
		if(empty($videoGalleryRecord)){
			$getRequest = LiteFrame::FetchGetVariable();
			Redirect::Action("videogallery",array("status"=>'not_found','videoCategoryId'=>$getRequest['videoCategoryId']));
			return;
		
		}

		$videoGalleryRecord->title = $request['videoGalleryTitle'];
		$videoGalleryRecord->description = $request['videoGalleryDescription'];
		$videoGalleryRecord->video_url = $request['videoGalleryVideoId'];
		$videoGalleryRecord->status = $request['videoGalleryStatus'];
		$videoGalleryRecord->image_thumb_url = VimeoModule::getMediumThumbnailUrl($request['videoGalleryVideoId']);
		$videoGalleryRecord->updated_date = ModuleHelper::getCurrentSqlDate();
		if($videoGalleryRecord->Save()){
			Redirect::Action("videogallery",array("status"=>'edit',"videoCategoryId"=>$request['videoCategoryId']));
		}else{
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$SQL_ERROR;
		}

	}
	
	
	private function deleteVideoGallery($videoGalleryId){


		$request = LiteFrame::FetchGetVariable();
		$record = DatabaseStatic::$ah->LoadId_videos($videoGalleryId);
		$record->status = 'delete';
		if(!empty($record)){
			$delete = $record->Save();
			if($delete){Redirect::Action("videogallery",array("status"=>'delete',"videoCategoryId"=>$request['videoCategoryId']));	}
			else{Redirect::Action("videogallery",array("status"=>'error','videoCategoryId'=>$request['videoCategoryId']));}
		}else{
			Redirect::Action("404");
		}
				
	}
	
}
?>
