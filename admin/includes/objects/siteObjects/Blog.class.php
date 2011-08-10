<?php 

class Blog extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $EMPTY_FIELDS_ERROR = 'Warning: Please fill all the required text fields';
	
	private static $REQUIRED_FIELDS = array('blogTitle',
											'blogShortDescription',
											'blogAuthor',
											'blogArticle',
											'blogStatus',
											'maxSize');

	private static $REQUIRED_EDIT_FIELDS = array('blogTitle',
												 'blogAuthor',
												 'blogArticle',
												 'blogId',
												 'blogStatus',
												 'blogShortDescription',
												 'maxSize');
	
	private static $NON_EMPTY_FIELDS = array('blogTitle',
											 'blogAuthor',
											 'blogStatus',
											 'blogArticle');
	
	private static $NON_EMPTY_EDIT_FIELDS = array('blogTitle',
											 'blogAuthor',
											 'blogStatus',
											 'blogArticle',
											 'blogId');
	
	
	private static $MANAGE_BLOGS_SQL = "
		SELECT A.`fullname` as author,
			   B.`id` AS blogId,
			   B.`title`,
			   B.`status`,
			   B.`entry_date`,
			   B.`thumbnail`
		FROM blogs AS B
		JOIN authors AS A on ( A.`id` = B.`author_id` )
		ORDER BY B.`entry_date` DESC
	";
	
	
	public function process(){
		
		$request = LiteFrame::FetchGetVariable();
		if(!isset($request['type'])){
			$this->manageBlogs();
		}else{
			$types= array('edit','delete','add');
			if( empty($request['type']) || !in_array($request['type'],$types)){
				
				Redirect::Action("404");
				return; 
			}
			switch($request['type']){
				case "add":
					$this->addBlog();
					break;
				case "edit":
					if( !isset($request['blogId']) || !Request::isNumeric($request['blogId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->editBlog($request['blogId']);
					break;
				case "delete":
					if( !isset($request['blogId']) || !Request::isNumeric($request['blogId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->deleteBlog($request['blogId']);
					break;
					
			}
			
		}
		
	}
	
	private function manageBlogs(){
		
		
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted a blog post';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added a new blog post';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited a blog post';
					break;	
				case "error":
					$this->results['errorMsg'] = self::$SQL_ERROR;
					break;
				case "not_found":
					$this->results['errorMsg'] = 'This record was not found in our databse';
					break;
					
			}
		}
		$result = DatabaseStatic::Query(self::$MANAGE_BLOGS_SQL);
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['date'] = date('F jS, Y',strtotime($row['entry_date']));
			$row['imageThumbUrl'] = ($row['thumbnail'] !='')? UrlModule::$BLOG_THUMB_PATH . $row['thumbnail']:''; 
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=blog&blogId=' . $row['blogId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function setUnEditedRecords(){
	
		$request = LiteFrame::FetchPostVariable();
		$this->results['record'] = array();
		$record = &$this->results['record'];
    	$record['blogTitle'] =  $request['blogTitle'];
    	$record['blogAuthor'] =  $request['blogAuthor'];
    	$record['blogShortDescription'] = $request['blogShortDescription'];
    	$record['blogStatus'] = $request['blogStatus'];
    	$record['blogArticle'] = $request['blogArticle'];
    	$record['blogId'] = $request['blogId'];
		
	}
	
	private function editBlog(){


		if(!Request::issetFields(self::$REQUIRED_EDIT_FIELDS,'POST')){ //SHOW EDIT FORM
	    		
			$getRequest = LiteFrame::FetchGetVariable();
		
				$this->results['blogId'] = $getRequest['blogId'];
				$this->results['authors'] = Authors::getAuthors();
	    		$blogRecord = DatabaseStatic::$ah->LoadId_blogs($getRequest['blogId']);
	    		$blogDetailRecord = DatabaseStatic::$ah->LoadSingle_blogs_detail(array('conditions'=>"blog_id=".$getRequest['blogId']));
	    		if(empty($blogRecord) || empty($blogDetailRecord) ){
	    			Redirect::Action("blog",array("status"=>'not_found'));
					return;
	    		}
	    		
				$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['blogTitle'] =  $blogRecord->title;
				$record['blogAuthor'] =  $blogRecord->author_id;
				$record['blogShortDescription'] =  $blogRecord->short_description;
				$record['blogImageUrl'] =  $blogRecord->thumbnail;
				$record['blogStatus'] = $blogRecord->status;
				$record['blogArticle'] = $blogDetailRecord->article;
					
	    		return;
	    }
	
    	// UPDATING
		$request = Request::trimAllRequest('POST');
		if(	Request::hasEmptyField(self::$NON_EMPTY_EDIT_FIELDS,'POST') || 
			!Request::isNumeric($request['blogId']) ||
			!isset($_FILES['blogImageUrl']) ||
			!Request::isNumeric($request['blogAuthor'])
		){
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
			return;
		}
		
		$blogRecord = DatabaseStatic::$ah->LoadId_blogs($request['blogId']);
		$blogDetailRecord = DatabaseStatic::$ah->LoadSingle_blogs_detail(array('conditions'=>"blog_id=".$request['blogId']));
				
		if(empty($blogRecord) || empty($blogDetailRecord)){
					Redirect::Action("blog",array("status"=>'not_found'));
					return;
		}
		if(!empty($_FILES['blogImageUrl']['name'])){
			try{	
				$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['blogImageUrl'] );
				$uploadImage->setSize($request['maxSize']);
				$uploadImage->setOverwrite(true);
				$uploadImage->setImageName("blog".$request['blogId']."_".$_FILES['blogImageUrl']['name']);
				if($uploadImage->upload()){
										
	     			$resizeObj = new ImageResize($uploadImage->getImagePath());
	  	 			$size = getimagesize($uploadImage->getImagePath());
	     			$resizeObj->resizeImage(220, 352, 0); 
	     			$resizeObj->saveImage(UrlModule::$BLOG_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
					
				}
			}catch(ImageUploadException $e){
				$this->results['errorMsg'] = $e->getMessage();
				$this->setUnEditedRecords();
				return;
			}catch(Exception $e){
				$this->resutls['errorMsg'] = "unknown error: can't upload an image";
				$this->setUnEditedRecords();
				return;
			}
		}
		
		
		$blogRecord->title = $request['blogTitle'];
		$blogRecord->author_id = $request['blogAuthor'];
		$blogRecord->short_description = $request['blogShortDescription'];
		$blogRecord->status = $request['blogStatus'];
		if(!empty($_FILES['blogImageUrl']['name'])){
			$blogRecord->thumbnail = $uploadImage->getImageName();
		}
		$blogRecord->updated_date = ModuleHelper::getCurrentSqlDate();
		
		if($blogRecord->Save()){
			$blogDetailRecord->article = $request['blogArticle'];
			$blogDetailRecord->updated_date = date("y-m-d : H:i:s", time()); 
			if($blogDetailRecord->Save()){
				Redirect::Action("blog",array("status"=>'edit'));
			}else{
				$blogRecord->Delete();
				$this->setUnEditedRecords();
				$this->results['errorMsg'] = self::$SQL_ERROR;
			}
		}else{
			$this->setUnEditedRecords();
			$this->results['errorMsg'] = self::$SQL_ERROR;
		}
		
	}
	


	private function addBlog(){
		$this->results['authors'] = Authors::getAuthors();
		if(Request::issetFields(self::$REQUIRED_FIELDS,'POST') && isset($_FILES['blogImageUrl'])){			
		   	
			$request = Request::trimAllRequest('POST');
			if(Request::hasEmptyField(self::$NON_EMPTY_FIELDS,'POST') || !Request::isNumeric($request['blogAuthor']) ){
				$this->results['errorMsg'] = self::$EMPTY_FIELDS_ERROR;
				return;				
			}
			if( !empty($_FILES['blogImageUrl']['name'])){
				try{	
					$uploadImage = new ImageUpload(UrlModule::$IMAGE_GALLERY_TEMP_FILE_PATH, $_FILES['blogImageUrl'] );
					$uploadImage->setSize($request['maxSize']);
					$uploadImage->setOverwrite(true);
					$uploadImage->setImageName("blog".ModuleHelper::betterRand(100000,10000000)."_".$_FILES['blogImageUrl']['name']);
					if($uploadImage->upload()){
		     			$resizeObj = new ImageResize($uploadImage->getImagePath());
		  	 			$size = getimagesize($uploadImage->getImagePath());
		     			$resizeObj->resizeImage(220, 352, 0); 
		     			$resizeObj->saveImage(UrlModule::$BLOG_THUMB_FILE_PATH.$uploadImage->getImageName(), 100);
						
						$blogRecord = DatabaseStatic::$ah->Create_blogs();
						$blogRecord->title = $request['blogTitle'];
						$blogRecord->author_id = $request['blogAuthor'];
						$blogRecord->short_description = $request['blogShortDescription'];
						$blogRecord->status = $request['blogStatus'];
						$blogRecord->thumbnail = $uploadImage->getImageName();
						$blogRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
						$blogRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
					}
				}catch(ImageUploadException $e){
					$this->results['errorMsg'] = $e->getMessage();
					$this->setUnEditedRecords();
					return;
				}catch(Exception $e){
					$this->resutls['errorMsg'] = "unknown error: can't upload an image";
					$this->setUnEditedRecords();
					return;
				}
			}else{
				$blogRecord = DatabaseStatic::$ah->Create_blogs();
				$blogRecord->title = $request['blogTitle'];
				$blogRecord->author_id = $request['blogAuthor'];
				$blogRecord->short_description = $request['blogShortDescription'];
				$blogRecord->status = $request['blogStatus'];
				$blogRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
				$blogRecord->updated_date = ModuleHelper::getCurrentSqlDate();  
							
			}
			
			if($blogRecord->Save()){
					$blogDetailRecord = DatabaseStatic::$ah->Create_blogs_detail();
					$blogDetailRecord->article = $request['blogArticle'];
					$blogDetailRecord->blog_id = DatabaseStatic::LastInsertId();
					$blogDetailRecord->entry_date = ModuleHelper::getCurrentSqlDate();  
					$blogDetailRecord->updated_date =ModuleHelper::getCurrentSqlDate();  
					if($blogDetailRecord->Save()){
						Redirect::Action("blog",array("status"=>'add'));
					}else{
						$blogRecord->Delete();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
			}else{
					$this->results['errorMsg'] = self::$SQL_ERROR;
			}
			
			
    	}  	
		
		
	}

	
	
	private function deleteBlog($blogId){
		
		$record = DatabaseStatic::$ah->LoadId_blogs($blogId);
		if(!empty($record)){
			$delete = $record->Delete();
			if($delete){Redirect::Action("blog",array("status"=>'delete'));	}
			else{Redirect::Action("blog",array("status"=>'error'));}
		}else{
			Redirect::Action("404");
		}
		
	}
	
}
?>