<?php 

	class Books extends SiteObject {
		
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
			
			$imagePath = LiteFrame::GetApplicationPath()."files/books/images/";
			$booksPath = LiteFrame::GetApplicationPath()."files/books/";
			
			$this->results = array(
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