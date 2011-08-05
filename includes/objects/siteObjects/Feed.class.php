<?php 

	class Feed extends SiteObject {
		
		
		public function __construct(){
			parent::__construct();
		}
		
		private static $BLOGS_QUERY = "
			SELECT B.`id` AS blogId,
				   B.`title`,
				   B.`short_description` AS shortDescription,
				   B.`entry_date` AS entryDate
			FROM blogs AS B
			WHERE B.`status` = 'active'
			ORDER BY B.`entry_date` DESC
		";
		
		public function process(){
				
				$rssFeed = new RssFeed();
				$rssFeed->setTitle("Anwar Al-HussainTV Latest Blogs RSS");
				$rssFeed->setLink("http://alhussaintv.tv");
				$rssFeed->setDesc("The Channel");
				$rssFeed->setLang("en-us");
				$rssFeed->setCopyright("All rights reserved 2011");
				$result = DatabaseStatic::Query(self::$BLOGS_QUERY);
				while($row=DatabaseStatic::FetchAssoc($result)){
					$rssFeed->addItem(
						$row['title'],
						$row['shortDescription'],
						LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['blogId'],
						$row['entryDate']
					);
				}
				$this->results = $rssFeed->getResult();
		}
		
	}


?>