<?php 
	class News extends SiteObject {
		
		private static $NEWS_QUERY = "
			SELECT A.`fullname`,
				   N.`id` AS newsId,
				   N.`title`,
				   N.`short_description` AS shortDescription,
				   N.`rate_average`,
				   N.`entry_date`,
				   N.`image`,
				   ND.`article`
			FROM news AS N
			JOIN news_detail AS ND on ( N.`id` = ND.`news_id` )
			JOIN authors AS A on ( A.`id` = N.`author_id` )
			WHERE N.`status` = 'active'
			AND N.`id` = %d	 
			LIMIT 1
		";
		
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$this->results['record'] = "";
			$vars = LiteFrame::FetchGetVariable();
			if( !isset($vars['newsId']) || !is_numeric($vars['newsId'])||  !is_int((int)$vars['newsId'])){ 
				Redirect::Action("404");
				return; 
			}
			$result = DatabaseStatic::Query(sprintf(self::$NEWS_QUERY,$vars['newsId']));
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['friendlyDate'] = date('F jS, Y',strtotime($row['entry_date']));
				$row['time'] = date('H:i',strtotime($row['entry_date']));
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=news&newsId=' . $row['newsId']; 
				$row['article'] = html_entity_decode($row['article']);
				$row['thumb'] = UrlModule::$NEWS_THUMB_PATH . $row['image'];
				$this->results['record'] = $row;
			}
		
			
			if(empty($this->results['record'])){
				Redirect::Action("404");
			}
		}
	}
?>