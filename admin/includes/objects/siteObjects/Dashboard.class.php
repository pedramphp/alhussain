<?php 

class Dashboard extends SiteObject{
	
	private static $SQL_ERROR = 'Warning: unexpected error occured on our server, please try again';
			
	public function __construct(){
			parent::__construct();
	}
	
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
		
		$this->results['comments'] = $this->getPendingComments();
		
		if(isset($request['activeAction'])&& !empty($request['activeAction']) && in_array($request['activeAction'],array('comments'))  ){
			if(isset($request['status']) && in_array($request['status'],array('disapprove','approve','delete','add','error','not_found','edit')) ){
				if($request['activeAction'] == 'comments'){
					
					switch($request['status']){
						case "disapprove":
							$this->results['comments']['successMsg'] = 'Congratulations you have successfully disapproved a comment';
							break;
						case "approve":
							$this->results['comments']['successMsg'] = 'Congratulations you have accepted a comment';
							break;
						case "error":
							$this->results['comments']['errorMsg'] = self::$SQL_ERROR;
							break;
						case "not_found":
							$this->results['comments']['errorMsg'] = 'This record was not found in our database';
							break;
							
					}
				}
			}
		}
		
		$this->results['subscribers'] = SubscribersCore::getSubscribers(20);
	}
	
	
	private function getPendingComments(){
		
		return CommentsCore::getPendingComments('dashboard');
		
	}
	
	
	private function disapproveComment($commentId){
		
		CommentsCore::disapprove($commentId,"dashboard");
		
	}
	
	
	private function approveComment($commentId){
		
		CommentsCore::approve($commentId,"dashboard");
		
	}
}
?>