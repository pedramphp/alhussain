<?php 

class ImageCategory extends SiteObject{
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('imageCategoryTitle',
											'imageCategoryStatus',
											'imageCategoryDescription');
	
	private static $REQUIRED_EDIT_FIELDS = array('imageCategoryTitle',
												'imageCategoryDescription',
												'imageCategoryStatus',
												'imageCategoryId');
	
	private static $NON_EMPTY_FIELDS = array('imageCategoryTitle',
											 'imageCategoryStatus');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('imageCategoryTitle',
											 		'imageCategoryStatus',
													'imageCategoryId');
	
	public function __construct(){
			parent::__construct();
	}
	

	
	private static $MANAGE_IMAGE_CATEGORIES_SQL = "
		SELECT IC.`id` AS imageCategoryId,
			   IC.`title`,
			   IC.`status`,
			   IC.`description`,
			   IC.`entry_date` AS entryDate,
			   IF(I.`id` IS NULL,0,COUNT(*)) AS size,
			   I.`image_thumb_url` AS albumCover
		FROM images_category AS IC
		LEFT JOIN images AS I ON ( I.`image_category_id` = IC.`id` AND I.`status` = 'active')
		WHERE	IC.`status` <> 'delete'
		GROUP BY IC.`id`
		ORDER BY IC.`entry_date` DESC
	";
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			$this->manageImageCategories();
			return;
			
		}
		$types= array('edit','delete','add');
		if( empty($request['type']) || !in_array($request['type'],$types)){
			
			Redirect::Action("404");
			return; 
		}
		switch($request['type']){
			case "add":
				$this->addImageCategory();
				break;
			case "edit":
				if( !isset($request['imageCategoryId']) || !Request::isNumeric($request['imageCategoryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->editImageCategory($request['imageCategoryId']);
				break;
			case "delete":
				if( !isset($request['imageCategoryId']) || !Request::isNumeric($request['imageCategoryId'])){ 
					Redirect::Action("404");
					return; 
				}
				$this->deleteImageCategory($request['imageCategoryId']);
				break;
				
		}
			
		
		
	}
	
	
	private function manageImageCategories(){
		
		$result = DatabaseStatic::Query(self::$MANAGE_IMAGE_CATEGORIES_SQL);
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted an image category';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added an image category';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited an image category';
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
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=imagecategory&imageCategoryId=' . $row['imageCategoryId'].'&type=edit'; 
			$row['images'] = LiteFrame::GetApplicationPath() . '?action=imagegallery&imageCategoryId=' . $row['imageCategoryId']; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=imagecategory&imageCategoryId=' . $row['imageCategoryId'].'&type=delete'; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=imageGallery'; 
			$row['albumCover'] = ($row['albumCover'] !='')? UrlModule::$IMAGE_GALLERY_THUMB_PATH . $row['albumCover']:'';
			$this->results['records'][] = $row;
		}
	}
	
	
	private function addImageCategory(){		
			
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST')){			
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST')){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}

			$imageCategoryRecord = DatabaseStatic::$ah->Create_images_category();
			$imageCategoryRecord->title = $request['imageCategoryTitle'];
			$imageCategoryRecord->status = $request['imageCategoryStatus'];
			$imageCategoryRecord->description = $request['imageCategoryDescription'];
			$imageCategoryRecord->entry_date = ModuleHelper::getCurrentSqlDate(); 
			$imageCategoryRecord->updated_date = ModuleHelper::getCurrentSqlDate();  

			if($imageCategoryRecord->Save()){
				Redirect::Action("imagecategory",array("status"=>'add'));
			}else{
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
    	}    				
	}
	
	private function setUnEditedRecords(){
		
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['imageCategoryTitle'] =  $request['imageCategoryTitle'];
    	$record['imageCategoryDescription'] =  $request['imageCategoryDescription'];
    	$record['imageCategoryStatus'] = $request['imageCategoryStatus'];
		$record['imageCategoryId'] = $request['imageCategoryId'];

	}
	
	private function editImageCategory(){

		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
    		$imageCategoryRecord = DatabaseStatic::$ah->LoadId_images_category($getRequest['imageCategoryId']);

    		if(empty($imageCategoryRecord)){
    			Redirect::Action("imagecategory",array("status"=>'not_found'));
				return;
    		}else{
    		
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['imageCategoryTitle'] =  $imageCategoryRecord->title;
    			$record['imageCategoryDescription'] =  $imageCategoryRecord->description;
    			$record['imageCategoryId'] =  $imageCategoryRecord->id;
    			$record['imageCategoryStatus'] = $imageCategoryRecord->status;
				$record['imageCategoryEntryDate'] = ModuleHelper::getFormatedDate( $imageCategoryRecord->entry_date );

    		}
    	}else{ // UPDATING
			$request = Request::trimAllRequest('POST');
			if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
				!Request::isNumeric($request['imageCategoryId'])){
				$this->setUnEditedRecords();
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;
			}
				
			$imageCategoryRecord = DatabaseStatic::$ah->LoadId_images_category($request['imageCategoryId']);
			if(!empty($imageCategoryRecord)){
					$imageCategoryRecord->title = $request['imageCategoryTitle'];
					$imageCategoryRecord->description = $request['imageCategoryDescription'];
					$imageCategoryRecord->status = $request['imageCategoryStatus'];
					$imageCategoryRecord->updated_date = ModuleHelper::getCurrentSqlDate();
					if($imageCategoryRecord->Save()){
						Redirect::Action("imagecategory",array("status"=>'edit'));
					}else{
						$this->setUnEditedRecords();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
			
			}else{
				Redirect::Action("imagecategory",array("status"=>'not_found'));
				return;
			}
			
    	}				
    			
	}
	
	
	private function deleteImageCategory($imageCategoryId){

		$record = DatabaseStatic::$ah->LoadId_images_category($imageCategoryId);
		$record->status = 'delete';
		if(!empty($record)){
			$delete = $record->Save();
			if($delete){Redirect::Action("imagecategory",array("status"=>'delete'));	}
			else{Redirect::Action("imagecategory",array("status"=>'error'));}
		}else{
			Redirect::Action("404");
		}
	}
	
}
?>
