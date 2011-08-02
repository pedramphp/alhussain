<?php 
	class Blog extends SiteObject {
		
		private static $BLOG_QUERY = "
			SELECT A.`fullname`,
				   B.`id` AS blogId,
				   B.`title`,
				   B.`short_description` AS shortDescription,
				   B.`rate_average`,
				   B.`entry_date`,
				   B.`thumbnail`,
				   BD.`article`
			FROM blogs AS B
			JOIN blogs_detail AS BD on ( B.`id` = BD.`blog_id` )
			JOIN authors AS A on ( A.`id` = B.`author_id` )
			WHERE B.`status` = 'active'
			AND B.`id` = %d	 
			LIMIT 1
		";
		
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$this->results['record'] = "";
			$vars = LiteFrame::FetchGetVariable();
			if( !isset($vars['blogId']) || !is_numeric($vars['blogId'])||  !is_int((int)$vars['blogId'])){ 
				Redirect::Action("404");
				return; 
			}
			$result = DatabaseStatic::Query(sprintf(self::$BLOG_QUERY,$vars['blogId']));
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['friendlyDate'] = date('F jS, Y',strtotime($row['entry_date']));
				$row['time'] = date('H:i',strtotime($row['entry_date']));
				$row['thumb'] = UrlModule::$BLOG_THUMB_PATH . $row['thumbnail'];
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId']; 
				$row['article'] = html_entity_decode($row['article']);
				$this->results['record'] = $row;
			}
			if(empty($this->results['record'])){
				Redirect::Action("404");
			}
		}
	}
?>