<?php 

class Comments extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
	
	
	public function process(){
	
		$request = LiteFrame::FetchGetVariable();
		if(isset($request['type'])){
			$types= array('approve','disapprove');
			if( empty($request['type']) || !in_array($request['type'],$types)){
				
				Redirect::Action("404");
				return; 
			}
			switch($request['type']){
				case "approve":
					if( !isset($request['commentsId']) || !Request::isNumeric($request['commentsId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->approveComment($request['commentsId']);
					break;
				case "disapprove":
					if( !isset($request['commentsId']) || !Request::isNumeric($request['commentsId'])){ 
						Redirect::Action("404");
						return; 
					}
					$this->disapproveComment($request['commentsId']);
					break;
					
			}	
		}
		$this->results = $this->getAllComments();
		
		if(isset($request['status']) && in_array($request['status'],array('disapprove','approve')) ){
			switch($request['status']){
					case "disapprove":
						$this->results['successMsg'] = 'Congratulations you have successfully disapproved a comment';
						break;
					case "approve":
						$this->results['successMsg'] = 'Congratulations you have accepted a comment';
						break;
					case "error":
						$this->results['errorMsg'] = self::$SQL_ERROR;
						break;
					case "not_found":
						$this->results['errorMsg'] = 'This record was not found in our database';
						break;
						
			}
			
		}
	}
	
	private function getAllComments(){
		
		return CommentsCore::getAllComments('comments');
		
	}
	
	
	private function disapproveComment($commentId){
		
		CommentsCore::disapprove($commentId,"comments");
		
	}
	
	
	private function approveComment($commentId){
		
		CommentsCore::approve($commentId,"comments");
		
	}
}
?>
