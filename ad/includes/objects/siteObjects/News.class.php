<?php 

class News extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	private static $MANAGE_News_SQL = "
		SELECT A.`fullname` as author,
			   B.`id` AS newsId,
			   B.`title`,
			   B.`status`,
			   B.`entry_date`
		FROM news AS B
		JOIN authors AS A on ( A.`id` = B.`author_id` )
		ORDER BY B.`entry_date` DESC
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
		$result = DatabaseStatic::Query(self::$MANAGE_News_SQL);
		$this->results['records'] = array();
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['status']) && in_array($request['status'],array('delete','add','error','not_found','edit')) ){
			switch($request['status']){
				case "delete":
					$this->results['successMsg'] = 'Congratulations you have successfully deleted a news';
					break;
				case "add":
					$this->results['successMsg'] = 'Congratulations you have successfully added a news';
					break;
				case "edit":
					$this->results['successMsg'] = 'Congratulations you have successfully edited a news';
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
			$row['date'] = date('F jS, Y',strtotime($row['entry_date']));
			$row['preview'] = dirname(LiteFrame::GetApplicationPath()) . '?action=news&newsId=' . $row['newsId']; 
			$row['edit'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId'].'&type=edit'; 
			$row['delete'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId'].'&type=delete'; 
			$this->results['records'][] = $row;
		}
	}
	
	
	private function editNews(){
		
		$request = LiteFrame::FetchPostVariable();
    	if(!isset($request['newsTitle'],
    			 $request['newsShortDescription'],
    			 $request['newsImageUrl'],
    			 $request['newsAuthor'],
    			 $request['newsArticle'],
    			 $request['newsStatus'],
    			 $request['newsId']
    	)){ //SHOW EDIT FORM
    		
    		$getRequest = LiteFrame::FetchGetVariable();
			$this->results['newsId'] = $getRequest['newsId'];
			$this->results['authors'] = Authors::getAuthors();
    		$newsRecord = DatabaseStatic::$ah->LoadId_news($getRequest['newsId']);
    		
    		$newsDetailRecord = DatabaseStatic::$ah->LoadSingle_news_detail(array('conditions'=>"news_id=".$getRequest['newsId']));
    		if(empty($newsRecord) || empty($newsDetailRecord) ){
    			Redirect::Action("news",array("status"=>'not_found'));
				return;
    		}else{
    			$this->results['record'] = array();
				$record = &$this->results['record'];
    			$record['newsTitle'] =  $newsRecord->title;
				$record['newsAuthor'] =  $newsRecord->author_id;
				$record['newsShortDescription'] =  $newsRecord->short_description;
				$record['newsImageUrl'] =  $newsRecord->image;
				$record['newsStatus'] = $newsRecord->status;
				$record['newsArticle'] = $newsDetailRecord->article;
				
    		}
    	}else{ // UPDATING
    		$request['newsTitle'] = trim($request['newsTitle']);
    		$request['newsShortDescription'] = trim($request['newsShortDescription']);
    		$request['newsImageUrl'] = trim($request['newsImageUrl']);
    		$request['newsArticle'] = trim($request['newsArticle']);
    		
			if( !empty($request['newsTitle']) && 
				!empty($request['newsShortDescription']) &&
				!empty($request['newsImageUrl']) &&
				!empty($request['newsArticle']) &&
				!empty($request['newsStatus']) &&
				Request::isNumeric($request['newsAuthor']) &&
				Request::isNumeric($request['newsId'])
			){
				$newsRecord = DatabaseStatic::$ah->LoadId_news($request['newsId']);
				$newsDetailRecord = DatabaseStatic::$ah->LoadSingle_news_detail(array('conditions'=>"news_id=".$request['newsId']));
				if(!empty($newsRecord) && !empty($newsDetailRecord) ){
						$newsRecord->title = $request['newsTitle'];
						$newsRecord->author_id = $request['newsAuthor'];
						$newsRecord->short_description = $request['newsShortDescription'];
						$newsRecord->status = $request['newsStatus'];
						$newsRecord->image = $request['newsImageUrl'];
						$newsRecord->updated_date = date("y-m-d : H:i:s", time()); 
						
						if($newsRecord->Save()){
							$newsDetailRecord->article = $request['newsArticle'];
							$newsDetailRecord->updated_date = date("y-m-d : H:i:s", time()); 
							if($newsDetailRecord->Save()){
								Redirect::Action("news",array("status"=>'edit'));
							}else{
								$newsRecord->Delete();
								$this->results['errorMsg'] = self::$SQL_ERROR;
							}
						}else{
							$newsRecord->Delete();
							$this->results['errorMsg'] = self::$SQL_ERROR;
						}
				
				}else{
					Redirect::Action("news",array("status"=>'not_found'));
					return;
				}
			}else{
				$this->results['errorMsg'] = 'Warning: Please fill all the text fields to edit this post';
				return;
			}
    	}		
    			
	}
	
	

	private function addNews(){
		
		$this->results['authors'] = Authors::getAuthors();
		$request = LiteFrame::FetchPostVariable();
    	if(isset($request['newsTitle'],
    			 $request['newsShortDescription'],
    			 $request['newsImageUrl'],
    			 $request['newsAuthor'],
    			 $request['newsArticle'],
    			 $request['newsStatus']
    	)){
    		$request['newsTitle'] = trim($request['newsTitle']);
    		$request['newsShortDescription'] = trim($request['newsShortDescription']);
    		$request['newsImageUrl'] = trim($request['newsImageUrl']);
    		$request['newsArticle'] = trim($request['newsArticle']);
			if( !empty($request['newsTitle']) && 
				!empty($request['newsShortDescription']) &&
				!empty($request['newsImageUrl']) &&
				!empty($request['newsArticle']) &&
				!empty($request['newsStatus']) &&
				Request::isNumeric($request['newsAuthor'])
			){
				$newsRecord = DatabaseStatic::$ah->Create_news();
				$newsRecord->title = $request['newsTitle'];
				$newsRecord->author_id = $request['newsAuthor'];
				$newsRecord->short_description = $request['newsShortDescription'];
				$newsRecord->status = $request['newsStatus'];
				$newsRecord->image = $request['newsImageUrl'];
				$newsRecord->entry_date = date("y-m-d H:i:s", time()); 
				$newsRecord->updated_date = date("y-m-d : H:i:s", time()); 

				if($newsRecord->Save()){
					$newsDetailRecord = DatabaseStatic::$ah->Create_news_detail();
					$newsDetailRecord->article = $request['newsArticle'];
					$newsDetailRecord->news_id = DatabaseStatic::LastInsertId();
					$newsDetailRecord->entry_date = date("y-m-d H:i:s", time()); 
					$newsDetailRecord->updated_date = date("y-m-d : H:i:s", time()); 
					if($newsDetailRecord->Save()){
						Redirect::Action("news",array("status"=>'add'));
					}else{
						$newsRecord->Delete();
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