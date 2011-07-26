<?php 
	class NewsList extends SiteObject {
		
		private static $NEWS_LIST_QUERY = "
			SELECT A.`fullname`,
				   N.`id` AS newsId,
				   N.`title`,
				   N.`short_description` AS shortDescription,
				   N.`rate_average`,
				   N.`entry_date`,
				   N.`image`
			FROM news AS N
			JOIN authors AS A on ( A.`id` = N.`author_id` )
			WHERE N.`status` = 'active'
			ORDER BY N.`entry_date` DESC
		";
		
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$result = DatabaseStatic::Query(self::$NEWS_LIST_QUERY);
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['friendlyDate'] = date('F jS, Y',strtotime($row['entry_date']));
				$row['time'] = date('H:i',strtotime($row['entry_date']));
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId']; 
				$this->results[] = $row;
			}
		}
	}
?>