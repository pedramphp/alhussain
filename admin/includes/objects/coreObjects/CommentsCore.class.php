<?php 

class CommentsCore{
	
	public function __construct(){}
	
	private static $PENDING_COMMENTS_SQL = "
		SELECT	C.`id` AS commentsId,
				C.`status`,
				C.`gender`,
				C.`fullname`,
				C.`comment`,
				C.`email`,
				C.`entry_date` AS entryDate
				
		FROM comments AS C
		WHERE C.`status` = 'pending'
		ORDER BY C.`entry_date` DESC
	";
	
	private static $All_COMMENTS_SQL = "
		SELECT	C.`id` AS commentsId,
				C.`status`,
				C.`gender`,
				C.`fullname`,
				C.`email`,
				C.`comment`,
				C.`entry_date` AS entryDate
				
		FROM comments AS C
		ORDER BY C.`entry_date` DESC
	";
	
	public static function getPendingComments( $action ){
		
		$result = DatabaseStatic::Query(self::$PENDING_COMMENTS_SQL);
		$records = array();
		$records['records'] = array();
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['entryDate'] = date('F jS, Y',strtotime($row['entryDate']));
			$row['disapprove'] = LiteFrame::GetApplicationPath() . '?action='.$action.'&commentsId=' . $row['commentsId'].'&type=disapprove';
			$row['approve'] = LiteFrame::GetApplicationPath() . '?action='.$action.'&commentsId=' . $row['commentsId'].'&type=approve'; 
			$records['records'][] = $row;
		}
		return $records;
		
	}
	
	
	public static function getAllComments( $action ){
		
		$result = DatabaseStatic::Query(self::$All_COMMENTS_SQL);
		$records = array();
		$records['records'] = array();
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['entryDate'] = date('F jS, Y',strtotime($row['entryDate']));
			$row['disapprove'] = LiteFrame::GetApplicationPath() . '?action='.$action.'&commentsId=' . $row['commentsId'].'&type=disapprove';
			$row['approve'] = LiteFrame::GetApplicationPath() . '?action='.$action.'&commentsId=' . $row['commentsId'].'&type=approve'; 
			$records['records'][] = $row;
		}
		return $records;
		
	}
	
	
	public static function disapprove($commentId, $action){
		
		$record = DatabaseStatic::$ah->LoadId_comments($commentId);
		if(!empty($record)){
			if($record->Delete()){Redirect::Action($action,array("status"=>'disapprove','activeAction'=>'comments'));	}
			else{Redirect::Action($action,array("status"=>'error','activeAction'=>'comments'));}
		}else{
			Redirect::Action($action,array("status"=>'not_found','activeAction'=>'comments'));
		}
		
	}
	
	
	public static function approve($commentId, $action){

		$record = DatabaseStatic::$ah->LoadId_comments($commentId);
		if(!empty($record)){
			$record->status = 'active';
			if($record->Save()){Redirect::Action($action,array("status"=>'approve','activeAction'=>'comments'));	}
			else{Redirect::Action($action,array("status"=>'error','activeAction'=>'comments'));}
		}else{
			Redirect::Action($action,array("status"=>'not_found','activeAction'=>'comments'));
		}
		
		
	}
	
	
	
	
}


?>