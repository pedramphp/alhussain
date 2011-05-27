<?php 

	class Books extends SiteObject {
		
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