<?php 

	class Comments extends SiteObject {
		
		private static $ACTIVE_COMMENTS_SQL = "
			SELECT	C.`id` AS commentsId,
					C.`status`,
					C.`gender`,
					C.`fullname`,
					C.`comment`,
					C.`entry_date` AS entryDate
					
			FROM comments AS C
			WHERE C.`status` = 'active'
			ORDER BY C.`entry_date` DESC
		";
				
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$result = DatabaseStatic::Query(self::$ACTIVE_COMMENTS_SQL);
			while($row=DatabaseStatic::FetchAssoc($result)){
				$this->results[] = $row;
			}		
			
		}
		
	}


?>