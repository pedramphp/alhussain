<?php 
	class Blogs extends SiteObject {
		
		private static $BLOGS_QUERY = "
			SELECT A.`fullname`,
				   B.`id` AS blogId,
				   B.`title`,
				   B.`short_description` AS shortDescription,
				   B.`rate_average`,
				   B.`entry_date`,
				   B.`thumbnail`
			FROM blogs AS B
			JOIN authors AS A on ( A.`id` = B.`author_id` )
			WHERE B.`status` = 'active'
			ORDER BY B.`entry_date` DESC
		";
		
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$query = DatabaseStatic::Query(Blogs::$BLOGS_QUERY);
			while($row=DatabaseStatic::FetchAssoc($query)){
				$row['friendlyDate'] = date('F jS, Y',strtotime($row['entry_date']));
				$row['time'] = date('H:i',strtotime($row['entry_date']));
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId']; 
				$this->results[] = $row;
			}
		}
	}
?>