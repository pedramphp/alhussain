<?php 

class News extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('newsTitle',
											'newsShortDescription',
											'newsAuthor',
											'newsArticle',
											'newsStatus',
											'maxSize');

	private static $REQUIRED_EDIT_FIELDS = array('newsTitle',
												 'newsAuthor',
												 'newsArticle',
												 'newsId',
												 'newsStatus',
												 'newsShortDescription',
												 'maxSize');
	
	private static $NON_EMPTY_FIELDS = array('newsTitle',
											 'newsAuthor',
											 'newsStatus',
											 'newsArticle');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('newsTitle',
											 'newsAuthor',
											 'newsStatus',
											 'newsArticle',
											 'newsId');
	
	
	private static $MANAGE_NEWS_SQL = "
		SELECT A.`fullname` as author,
			   N.`id` AS newsId,
			   N.`title`,
			   N.`status`,
			   N.`entry_date`,
			   N.`image`
		FROM news AS N
		JOIN authors AS A on ( A.`id` = N.`author_id` )
		ORDER BY N.`entry_date` DESC
	";
	
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			$this->manageNews();
		}else{
			$types= array('edit','delete','add');
			if( empty($request['type']) || !in_array($request['type'],$types)){
				
				Redirect::Action("404");
				return; 
			}
			switch($request['type']){
				case "add":
					$this->addNews();
					break;
				case "edit":
					if( !isset($request['newsId']) || !Request::isNumeric($request['newsId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->editNews($request['newsId']);
					break;
				case "delete":
					if( !isset($request['newsId']) || !Request::isNumeric($request['newsId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->deleteNews($request['newsId']);
					break;
					
			}
			
		}
		
	}
	
	private function manageNews(){
		
		
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted a news post';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added a new news post';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited a news post';
					break;	
				case "error":
					$this->results['errorMsg'] = self::$SQL_ERROR;
					break;
				case "not_found":
					$this->results['errorMsg'] = 'This record was not found in our databse';
					break;
					
			}
		}
		$result = DatabaseStatic::Query(self::$MANAGE_NEWS_SQL);
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['date'] = ModuleHelper::getFriendlyDate($row['entry_date']);
			$row['imageThumbUrl'] = ($row['image'] !='')? UrlModule::$NEWS_THUMB_PATH . $row['image']:''; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=news&newsId=' . $row['newsId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function setUnEditedRecords(){
	
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['newsTitle'] =  $request['newsTitle'];
    	$record['newsAuthor'] =  $request['newsAuthor'];
    	$record['newsShortDescription'] = $request['newsShortDescription'];
    	$record['newsStatus'] = $request['newsStatus'];
    	$record['newsArticle'] = $request['newsArticle'];
    	$record['newsId'] = $request['newsId'];
		
	}
	
	private function editNews($newsId){


		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
	    		
				$this->results['newsId'] = $newsId;
				$this->results['authors'] = Authors::getAuthors();
	    		$newsRecord = DatabaseStatic::$ah->LoadId_news($newsId);
	    		$newsDetailRecord = DatabaseStatic::$ah->LoadSingle_news_detail(array('conditions'=>"news_id=".$newsId));
	 
	    		if(empty($newsRecord) || empty($newsDetailRecord) ){
	    			Redirect::Action("news",array("status"=>'not_found'));
					return;
	    		}
	    		
				$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['newsTitle'] =  $newsRecord->title;
				$record['newsAuthor'] =  $newsRecord->author_id;
				$record['newsShortDescription'] =  $newsRecord->short_description;
				$record['newsImageUrl'] =  $newsRecord->image;
				$record['newsStatus'] = $newsRecord->status;
				$record['newsArticle'] = $newsDetailRecord->article;
					
	    		return;
	    }
	
    	// UPDATING
		$request = Request::trimAllRequest('POST');
		if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
			!Request::isNumeric($request['newsId']) ||
			!isset($_FILES['newsImageUrl']) ||
			!Request::isNumeric($request['newsAuthor']) ||
			!Request::isNumeric($request['newsId'])
		){
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
			return;
		}
		
		$newsRecord = DatabaseStatic::$ah->LoadId_news($request['newsId']);
		$newsDetailRecord = DatabaseStatic::$ah->LoadSingle_news_detail(array('conditions'=>"news_id=".$request['newsId']));
				
		if(empty($newsRecord) || empty($newsDetailRecord)){
					Redirect::Action("news",array("status"=>'not_found'));
					return;
		}
		if(!empty($_FILES['newsImageUrl']['name'])){
			try{	
				$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['newsImageUrl'] );
				$uploadImage->setSize($request['maxSize']);
				$uploadImage->setOverwrite(true);
				$uploadImage->setImageName("news".$request['newsId']."_".$_FILES['newsImageUrl']['name']);
				if($uploadImage->upload()){
										
	     			$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage(220, 352, 0); 
	     			$resizeObj->saveImage(UrlModule::$NEWS_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
					
				}
			}catch(ImageUploadException $e){
				$this->results['errorMsg'] = $e->getMessage();
				return;
			}catch(Exception $e){
				$this->resutls['errorMsg'] = "unknown error: can't upload an image";
				return;
			}
		}
		
		
		$newsRecord->title = $request['newsTitle'];
		$newsRecord->author_id = $request['newsAuthor'];
		$newsRecord->short_description = $request['newsShortDescription'];
		$newsRecord->status = $request['newsStatus'];
		if(!empty($_FILES['newsImageUrl']['name'])){
			$newsRecord->image = $uploadImage->getImageName();
		}
		$newsRecord->updated_date = ModuleHelper::getCurrentSqlDate();
		
		if($newsRecord->Save()){
			$newsDetailRecord->article = $request['newsArticle'];
			$newsDetailRecord->updated_date = ModuleHelper::getCurrentSqlDate();
			if($newsDetailRecord->Save()){
				Redirect::Action("news",array("status"=>'edit'));
			}else{
				$newsRecord->Delete();
				$this->setUnEditedRecords();
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
		}else{
			$newsRecord->Delete();
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$SQL_ERROR;
		}
		
	}
	


	private function addNews(){
		$this->results['authors'] = Authors::getAuthors();
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST') && isset($_FILES['newsImageUrl'])){			
		   	
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST') || !Request::isNumeric($request['newsAuthor'])  || !isset($_FILES['newsImageUrl'] )){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}
			if( !empty($_FILES['newsImageUrl']['name'])){
				try{	
					$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['newsImageUrl'] );
					$uploadImage->setSize($request['maxSize']);
					$uploadImage->setOverwrite(true);
					$uploadImage->setImageName("news".ModuleHelper::betterRand(100000,10000000)."_".$_FILES['newsImageUrl']['name']);
					if($uploadImage->upload()){
		     			$resizeObj = new ImageResize($uploadImage->getImagePath());
		  	 			$size = getimagesize($uploadImage->getImagePath());
		     			$resizeObj->resizeImage(220, 352, 0); 
		     			$resizeObj->saveImage(UrlModule::$NEWS_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
						
						$newsRecord = DatabaseStatic::$ah->Create_news();
						$newsRecord->title = $request['newsTitle'];
						$newsRecord->author_id = $request['newsAuthor'];
						$newsRecord->short_description = $request['newsShortDescription'];
						$newsRecord->status = $request['newsStatus'];
						$newsRecord->image = $uploadImage->getImageName();
						$newsRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
						$newsRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
					}
				}catch(ImageUploadException $e){
					$this->results['errorMsg'] = $e->getMessage();
					return;
				}catch(Exception $e){
					$this->resutls['errorMsg'] = "unknown error: can't upload an image";
					return;
				}
			}else{
				$newsRecord = DatabaseStatic::$ah->Create_news();
				$newsRecord->title = $request['newsTitle'];
				$newsRecord->author_id = $request['newsAuthor'];
				$newsRecord->short_description = $request['newsShortDescription'];
				$newsRecord->status = $request['newsStatus'];
				$newsRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
				$newsRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
							
			}
			
			if($newsRecord->Save()){
					$newsDetailRecord = DatabaseStatic::$ah->Create_news_detail();
					$newsDetailRecord->article = $request['newsArticle'];
					$newsDetailRecord->news_id = DatabaseStatic::LastInsertId();
					$newsDetailRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
					$newsDetailRecord->updated_date =ModuleHelper::getCurrentSqlDate();  
					if($newsDetailRecord->Save()){
						Redirect::Action("news",array("status"=>'add'));
					}else{
						$newsRecord->Delete();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
			}else{
					$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
			
    	}  	
		
		
	}

	
	
	private function deleteNews($newsId){
		
		$record = DatabaseStatic::$ah->LoadId_news($newsId);
		if(!empty($record)){
			$delete = $record->Delete();
			if($delete){Redirect::Action("news",array("status"=>'delete'));	}
			else{Redirect::Action("news",array("status"=>'error'));}
		}else{
			Redirect::Action("404");
		}
		
	}
	
}
?>