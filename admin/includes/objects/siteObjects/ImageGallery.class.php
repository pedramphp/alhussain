<?php 

class ImageGallery extends SiteObject{
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('imageGalleryTitle',
											'imageGalleryStatus',
											'maxSize',
											'imageCategoryId',
											'imageGalleryDescription');
	
	private static $REQUIRED_EDIT_FIELDS = array('imageGalleryTitle',
												 'imageGalleryDescription',
												 'imageGalleryStatus',
												 'imageGalleryId',
												 'imageCategoryId',
												 'maxSize');
	
	private static $NON_EMPTY_FIELDS = array('imageGalleryTitle',
											 'imageGalleryStatus');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('imageGalleryTitle',
											 	  'imageGalleryStatus',
												  'imageGalleryId');
	
	public function __construct(){
			parent::__construct();
	}
	

	
	private static $MANAGE_IMAGE_GALLERY_SQL = "
		SELECT I.`id` AS imageGalleryId,
			   I.`title`,
			   I.`status`,
			   I.`description`,
			   I.`entry_date` AS entryDate,
			   I.`image_url` AS imageUrl,
			   I.`image_thumb_url` AS imageThumbUrl,
			   IC.`title` AS imageCategoryTitle
			      
		FROM images AS I
		JOIN images_category AS IC ON(I.`image_category_id` = IC.`id` AND IC.`status` = 'active')
		WHERE	I.`status` <> 'delete'
		AND IC.`id` = %d
		GROUP BY imageGalleryId
		ORDER BY I.`entry_date` DESC
	";
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			if(isset($request['imageCategoryId']) && Request::isNumeric($request['imageCategoryId']) ){
				$this->manageImageGallery();
				return;
			}else{ // we need to change this in the future
				Redirect::Action("404");
				return; 				
			}
		}
		$types= array('edit','delete','add');
		if( empty($request['type']) || 
			!in_array($request['type'],$types) || 
			!isset($request['imageCategoryId']) || 
			!Request::isNumeric($request['imageCategoryId'])){
			
				Redirect::Action("404");
			return; 
		}
		switch($request['type']){
			case "add":
				$this->addImageGallery();
				break;
			case "edit":
				if( !isset($request['imageGalleryId']) || !Request::isNumeric($request['imageGalleryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->editImageGallery($request['imageGalleryId']);
				break;
			case "delete":
				if( !isset($request['imageGalleryId']) || !Request::isNumeric($request['imageGalleryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->deleteImageGallery($request['imageGalleryId']);
				break;
				
		}
			
		
		
	}
	
	
	private function manageImageGallery(){
		$request = LiteFrame::FetchGetVariable();
		$result = DatabaseStatic::Query(sprintf(self::$MANAGE_IMAGE_GALLERY_SQL,$request['imageCategoryId']));
		$this->results['records'] = array();
		
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted an image';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added an image';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited an image';
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
			$this->results['imageCategoryTitle'] = $row['imageCategoryTitle'];
			$row['entryDate'] = ModuleHelper::getFriendlyDate($row['entryDate']);
			$row['imageThumbUrl'] = UrlModule::$IMAGE_GALLERY_THUMB_PATH . $row['imageThumbUrl'];
			$row['imageUrl'] = UrlModule::$IMAGE_GALLERY_ORIGINAL_PATH . $row['imageUrl'];
			
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageGalleryId=' . $row['imageGalleryId'].'&type=edit&imageCategoryId='.$request['imageCategoryId']; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageGalleryId=' . $row['imageGalleryId'].'&type=delete&imageCategoryId='.$request['imageCategoryId']; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=image&catId='.$request['imageCategoryId']; 
			$this->results['records'][] = $row;
		}
		$this->results['addImage']= LiteFrame::GetApplicationPath() . '?action=imagegallery&type=add&imageCategoryId='.$request['imageCategoryId']; 
			
	}
	
	
	private function addImageGallery(){		
			
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST') && isset($_FILES['imageGalleryUrl'])){			
		   	
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST') || !Request::isNumeric($request['imageCategoryId']) || empty($_FILES['imageGalleryUrl']['name']) ){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}
			
			try{	
				$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['imageGalleryUrl'] );
				$uploadImage->setSize($request['maxSize']);
				$uploadImage->setOverwrite(true);
				$uploadImage->setImageName("cat".$request['imageCategoryId']."_".$request['imageGalleryId']."_".$_FILES['imageGalleryUrl']['name']);
				if($uploadImage->upload()){
					$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage($size[0], $size[1], 0); 
	     			$resizeObj->saveImage(UrlModule::$IMAGE_GALLERY_ORIGINAL_FILE_PATH.$uploadImage->getImageName(), 100);
					
	     			$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage(220, 352, 0); 
	     			$resizeObj->saveImage(UrlModule::$IMAGE_GALLERY_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
					
	     			$imageGalleryRecord = DatabaseStatic::$ah->Create_images();
					$imageGalleryRecord->title = $request['imageGalleryTitle'];
					$imageGalleryRecord->image_category_id = $request['imageCategoryId'];
					$imageGalleryRecord->status = $request['imageGalleryStatus'];
					$imageGalleryRecord->description = $request['imageGalleryDescription'];
					$imageGalleryRecord->image_url = $uploadImage->getImageName();
					$imageGalleryRecord->image_thumb_url = $uploadImage->getImageName();
					$imageGalleryRecord->entry_date = ModuleHelper::getCurrentSqlDate(); 
					$imageGalleryRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
				}
			}catch(ImageUploadException $e){
				$this->results['errorMsg'] = $e->getMessage();
				return;
			}catch(Exception $e){
				$this->resutls['errorMsg'] = "unknown error: can't upload an image";
				return;
			}
			
			if($imageGalleryRecord->Save()){
				Redirect::Action("imagegallery",array("status"=>'add','imageCategoryId'=>$request['imageCategoryId']));
			}else{
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
    	}else{
    		$getRequest = LiteFrame::FetchGetVariable();
    		$imageCategoryRecord = DatabaseStatic::$ah->LoadId_images_category($getRequest['imageCategoryId']);
    		$this->results['record'] = array();
			$record = &$this->results['record'];
    		$record['imageCategoryId'] =  $imageCategoryRecord->id;
    		$record['imageCategoryTitle'] = $imageCategoryRecord->title;
    		$record['formUrl'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&type=add&imageCategoryId='.$imageCategoryRecord->id; 
    		$record['imageGalleryLink'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageCategoryId=' . $imageCategoryRecord->id;
    	}    				
	}
	
	private function setUnEditedRecords(){
		
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['imageGalleryTitle'] =  $request['imageGalleryTitle'];
    	$record['imageGalleryDescription'] =  $request['imageGalleryDescription'];
    	$record['imageGalleryStatus'] = $request['imageGalleryStatus'];
		$record['imageGalleryId'] = $request['imageGalleryId'];
    	$record['imageCategoryId'] = $request['imageCategoryId'];
    	$record['imageGalleryUrl'] = $_FILES['imageGalleryUr']['name'];
		
	}
	
	private function editImageGallery(){
		
		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
    		$imageGalleryRecord = DatabaseStatic::$ah->LoadId_images($getRequest['imageGalleryId']);
    		
			$imageCategoryRecord = DatabaseStatic::$ah->LoadId_images_category($getRequest['imageCategoryId']);
    		
			if(empty($imageGalleryRecord) || empty($imageCategoryRecord)){
    			Redirect::Action("imagegallery",array("status"=>'not_found','imageCategoryId'=>$getRequest['imageCategoryId']));
				return;
    		}else{
    		
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['imageGalleryTitle'] =  $imageGalleryRecord->title;
    			$record['imageCategoryId'] =  $imageCategoryRecord->id;
    			$record['imageGalleryDescription'] =  $imageGalleryRecord->description;
    			$record['imageGalleryId'] =  $imageGalleryRecord->id;
    			$record['imageGalleryStatus'] = $imageGalleryRecord->status;
    			$record['imageGalleryUrl'] = $imageGalleryRecord->image_url;
				$record['imageGalleryEntryDate'] = ModuleHelper::getFormatedDate( $imageGalleryRecord->entry_date );
				$record['imageCategoryTitle'] = $imageCategoryRecord->title;
				$record['imageGalleryLink'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageCategoryId=' . $imageCategoryRecord->id;
				$record['formUrl'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageGalleryId='.$imageGalleryRecord->id.'&type=edit&imageCategoryId='.$imageCategoryRecord->id; 
			
				
    		}
    		return;
    	}

    	// UPDATING
		$request = Request::trimAllRequest('POST');
		if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
			!Request::isNumeric($request['imageGalleryId']) ||
			!Request::isNumeric($request['imageCategoryId']) ||
			!isset($_FILES['imageGalleryUrl'])		
		){
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
			return;
		}
		
		$imageGalleryRecord = DatabaseStatic::$ah->LoadSingle_images(array("conditions" => array("id"=>$request['imageGalleryId'],"image_category_id"=>$request['imageCategoryId'])));
		
		if(empty($imageGalleryRecord)){
			$getRequest = LiteFrame::FetchGetVariable();
			Redirect::Action("imagegallery",array("status"=>'not_found','imageCategoryId'=>$getRequest['imageCategoryId']));
			return;
		
		}
		if(!empty($_FILES['imageGalleryUrl']['name'])){
			try{	
				$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['imageGalleryUrl'] );
				$uploadImage->setSize($request['maxSize']);
				$uploadImage->setOverwrite(true);
				$uploadImage->setImageName("cat".$request['imageCategoryId']."_".$request['imageGalleryId']."_".$_FILES['imageGalleryUrl']['name']);
				if($uploadImage->upload()){
					$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage($size[0], $size[1], 0); 
	     			$resizeObj->saveImage(UrlModule::$IMAGE_GALLERY_ORIGINAL_FILE_PATH.$uploadImage->getImageName(), 100);
					
	     			$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage(220, 352, 0); 
	     			$resizeObj->saveImage(UrlModule::$IMAGE_GALLERY_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
					
				}
			}catch(ImageUploadException $e){
				$this->results['errorMsg'] = $e->getMessage();
				return;
			}catch(Exception $e){
				$this->resutls['errorMsg'] = "unknown error: can't upload an image";
				return;
			}
		}
		
		$imageGalleryRecord->title = $request['imageGalleryTitle'];
		$imageGalleryRecord->description = $request['imageGalleryDescription'];
		if(!empty($_FILES['imageGalleryUrl']['name'])){
			$imageGalleryRecord->image_url = $uploadImage->getImageName();
			$imageGalleryRecord->image_thumb_url = $uploadImage->getImageName();
		}
		$imageGalleryRecord->status = $request['imageGalleryStatus'];
		$imageGalleryRecord->updated_date = ModuleHelper::getCurrentSqlDate();
		
		if($imageGalleryRecord->Save()){
			Redirect::Action("imagegallery",array("status"=>'edit',"imageCategoryId"=>$request['imageCategoryId']));
		}else{
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$SQL_ERROR;
		}

	}
	
	
	private function deleteImageGallery($imageGalleryId){

		$request = LiteFrame::FetchGetVariable();
		$record = DatabaseStatic::$ah->LoadId_images($imageGalleryId);
		$record->status = 'delete';
		if(!empty($record)){
			$delete = $record->Save();
			if($delete){Redirect::Action("imagegallery",array("status"=>'delete',"imageCategoryId"=>$request['imageCategoryId']));	}
			else{Redirect::Action("imagegallery",array("status"=>'error','imageCategoryId'=>$request['imageCategoryId']));}
		}else{
			Redirect::Action("404");
		}
		
	}
	
}
?>
