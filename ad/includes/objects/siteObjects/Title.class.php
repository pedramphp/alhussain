<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "AlHussaintv Admin panel";
			switch(SiteHelper::GetAction()){
				case "homepage":
					$title = "Alhussaintv Admin Page";
					break;				
				case "login":
					$title = "Alhussaintv Login Page";
					break;		
			}
			$this->results = $title;
			
		}
		
	}


?>