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
					"title" 	=> "Fatemeh Shariati" ,
					"author"	=> "Dr Ali Shariati",
					"url"			=>	$booksPath . "Fatemeh-Shariati.pdf",
					"image"		=>	$imagePath . "fatemeh-ali-shariati.jpg"
				),
				array(
					"title" 	=> "Ghadir Al Khom" ,
					"author"	=> "Dr Ali Shariati",
					"url"			=>	$booksPath . "ghadir khom.pdf",
					"image"		=>	$imagePath . "khatebe-alghadir.jpg"
				),
				array(
					"title" 	=> "Haji" ,
					"author"	=> "Dr Ali Shariati",
					"url"			=>	$booksPath . "HajjAliSariati.pdf",
					"image"		=>	$imagePath . "hajj-ali-shariati.jpg"
				),
				array(
					"title" 	=> "Analysis of Haj" ,
					"author"	=> "Dr Ali Shariati",
					"url"			=>	$booksPath . "tahlili bar manasek haj.pdf",
					"image"		=>	$imagePath . "tahlili-az-manasek-haj-m.bagher-ansari.jpg"
				)
			);
			
		}
		
	}


?>