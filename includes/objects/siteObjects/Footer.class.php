<?php 
	class Footer extends SiteObject {
		
		private static $BLOGS_QUERY = "
			SELECT *
			FROM blogs AS B
			WHERE B.`status` = 'active'
			ORDER BY B.`entry_date` DESC
			LIMIT 7
		";
		
		private static $EVENTS_QUERY = "
			SELECT *
			FROM events AS E
			WHERE E.`status` = 'active'
			ORDER BY E.`entry_date` DESC
		";
		
				
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			
			$result = DatabaseStatic::Query(self::$BLOGS_QUERY);
			$this->results['blogs'] = array();
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=blog&blogId=' . $row['id']; 
				$this->results['blogs'][] = $row;
			}	
			
			$result = DatabaseStatic::Query(self::$EVENTS_QUERY);
			$this->results['events'] = array();
			while($row=DatabaseStatic::FetchAssoc($result)){
				$row['link'] = LiteFrame::GetApplicationPath() . '?action=events&eventId=' . $row['id']; 
				$this->results['events'][] = $row;
			}	
						
			$imagePath = LiteFrame::GetApplicationPath()."files/books/images/";
			$booksPath = LiteFrame::GetApplicationPath()."files/books/";
			
			$this->results['books'] = array(
				array(
					"title" 	=> "If Islam were to be established" ,
					"author"	=> "Imam Muhammad Shirazi",
					"url"			=>	$booksPath . "if islam were to be.pdf",
					"image"		=>	$imagePath . "a.jpg"
				),
				array(
					"title" 	=> "Islamic Law - Acts of Worship" ,
					"author"	=> "Grand Ayatollah - Sayyid Sadiq Husayni Shirazi",
					"url"			=>	$booksPath . "part-one.pdf",
					"image"		=>	$imagePath . "b.jpg"
				),
				array(
					"title" 	=> "The Prophet Muhammad A Mercy to the World" ,
					"author"	=> "Imam Muhammad Shirazi",
					"url"			=>	$booksPath . "mercy to the world.pdf",
					"image"		=>	$imagePath . "c.jpg"
				),
				array(
					"title" 	=> "The Qur'an made simple" ,
					"author"	=> "Imam Muhammad Shirazi",
					"url"			=>	$booksPath . "Qms28-30.pdf",
					"image"		=>	$imagePath . "d.jpg"
				),
				array(
					"title" 	=> "The Shi'a and their Beliefs" ,
					"author"	=> "Imam Muhammad Shirazi",
					"url"			=>	$booksPath . "shiism and the shia.pdf",
					"image"		=>	$imagePath . "e.jpg"
				)
			);
			
			
		}
	}
?>