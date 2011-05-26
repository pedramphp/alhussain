<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "AlHussain TV";
			switch(SiteHelper::GetAction()){
				case "homepage":
					$title = "AlHussain TV - Welcome to Islamic TV Station";
					break;				
				case "contact":
					$title = "Contact Alhussain TV";
					break;		
			}
			$this->results = $title;
			
		}
		
	}


?>