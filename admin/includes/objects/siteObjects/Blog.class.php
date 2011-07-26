<?php 

class Blog extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $MANAGE_BLOGS_SQL = "
		SELECT A.`fullname` as author,
			   B.`id` AS blogId,
			   B.`title`,
			   B.`status`,
			   B.`entry_date`
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
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=blog&blogId=' . $row['blogId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function editBlog(){

		$request = LiteFrame::FetchPostVariable();
    	if(!isset($request['blogTitle'],
    			 $request['blogShortDescription'],
    			 $request['blogImageUrl'],
    			 $request['blogAuthor'],
    			 $request['blogArticle'],
    			 $request['blogStatus'],
    			 $request['blogId']
    	)){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
			$this->results['blogId'] = $getRequest['blogId'];
			$this->results['authors'] = Authors::getAuthors();
    		$blogRecord = DatabaseStatic::$ah->LoadId_blogs($getRequest['blogId']);
    		$blogDetailRecord = DatabaseStatic::$ah->LoadSingle_blogs_detail(array('conditions'=>"blog_id=".$getRequest['blogId']));
    		if(empty($blogRecord) || empty($blogDetailRecord) ){
    			Redirect::Action("blog",array("status"=>'not_found'));
				return;
    		}else{
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['blogTitle'] =  $blogRecord->title;
				$record['blogAuthor'] =  $blogRecord->author_id;
				$record['blogShortDescription'] =  $blogRecord->short_description;
				$record['blogImageUrl'] =  $blogRecord->thumbnail;
				$record['blogStatus'] = $blogRecord->status;
				$record['blogArticle'] = $blogDetailRecord->article;
    		}
    	}else{ // UPDATING
    		$request['blogTitle'] = trim($request['blogTitle']);
    		$request['blogShortDescription'] = trim($request['blogShortDescription']);
    		$request['blogImageUrl'] = trim($request['blogImageUrl']);
    		$request['blogArticle'] = trim($request['blogArticle']);
			if( !empty($request['blogTitle']) && 
				!empty($request['blogShortDescription']) &&
				!empty($request['blogImageUrl']) &&
				!empty($request['blogArticle']) &&
				!empty($request['blogStatus']) &&
				Request::isNumeric($request['blogAuthor']) &&
				Request::isNumeric($request['blogId'])
			){
				$blogRecord = DatabaseStatic::$ah->LoadId_blogs($request['blogId']);
				$blogDetailRecord = DatabaseStatic::$ah->LoadSingle_blogs_detail(array('conditions'=>"blog_id=".$request['blogId']));
				if(!empty($blogRecord) && !empty($blogDetailRecord) ){
						$blogRecord->title = $request['blogTitle'];
						$blogRecord->author_id = $request['blogAuthor'];
						$blogRecord->short_description = $request['blogShortDescription'];
						$blogRecord->status = $request['blogStatus'];
						$blogRecord->thumbnail = $request['blogImageUrl'];
						$blogRecord->updated_date = date("y-m-d : H:i:s", time()); 
						
						if($blogRecord->Save()){
							$blogDetailRecord->article = $request['blogArticle'];
							$blogDetailRecord->updated_date = date("y-m-d : H:i:s", time()); 
							if($blogDetailRecord->Save()){
								Redirect::Action("blog",array("status"=>'edit'));
							}else{
								$blogRecord->Delete();
								$this->results['errorMsg'] = self::$SQL_ERROR;
							}
						}else{
							$blogRecord->Delete();
							$this->results['errorMsg'] = self::$SQL_ERROR;
						}
				
				}else{
					Redirect::Action("blog",array("status"=>'not_found'));
					return;
				}
			}else{
				$this->results['errorMsg'] = 'Warning: Please fill all the text fields to edit this post';
				return;
			}
    	}		
	}
	
	

	private function addBlog(){
		
		$this->results['authors'] = Authors::getAuthors();
		$request = LiteFrame::FetchPostVariable();
    	if(isset($request['blogTitle'],
    			 $request['blogShortDescription'],
    			 $request['blogImageUrl'],
    			 $request['blogAuthor'],
    			 $request['blogArticle'],
    			 $request['blogStatus']
    	)){
    		$request['blogTitle'] = trim($request['blogTitle']);
    		$request['blogShortDescription'] = trim($request['blogShortDescription']);
    		$request['blogImageUrl'] = trim($request['blogImageUrl']);
    		$request['blogArticle'] = trim($request['blogArticle']);
			if( !empty($request['blogTitle']) && 
				!empty($request['blogShortDescription']) &&
				!empty($request['blogImageUrl']) &&
				!empty($request['blogArticle']) &&
				!empty($request['blogStatus']) &&
				Request::isNumeric($request['blogAuthor'])
			){
				$blogRecord = DatabaseStatic::$ah->Create_blogs();
				$blogRecord->title = $request['blogTitle'];
				$blogRecord->author_id = $request['blogAuthor'];
				$blogRecord->short_description = $request['blogShortDescription'];
				$blogRecord->status = $request['blogStatus'];
				$blogRecord->thumbnail = $request['blogImageUrl'];
				$blogRecord->entry_date = date("y-m-d H:i:s", time()); 
				$blogRecord->updated_date = date("y-m-d : H:i:s", time()); 

				if($blogRecord->Save()){
					$blogDetailRecord = DatabaseStatic::$ah->Create_blogs_detail();
					$blogDetailRecord->article = $request['blogArticle'];
					$blogDetailRecord->blog_id = DatabaseStatic::LastInsertId();
					$blogDetailRecord->entry_date = date("y-m-d H:i:s", time()); 
					$blogDetailRecord->updated_date = date("y-m-d : H:i:s", time()); 
					if($blogDetailRecord->Save()){
						Redirect::Action("blog",array("status"=>'add'));
					}else{
						$blogRecord->Delete();
						$this->results['errorMsg'] = self::$SQL_ERROR;
					}
				}else{
					$this->results['errorMsg'] = self::$SQL_ERROR;
				}
			}else{
				$this->results['errorMsg'] = 'Warning: Please fill all the text fields';
				return;
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