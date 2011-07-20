<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "AlHussain TV";
			switch(SiteHelper::GetAction()){
				case "homepage":
					$title = "Anwar Al-Hussain TV - Satellite Network - The First English Shia Global Satellite Channel";
					break;				
				case "contact":
					$title = "Contact Alhussain TV - Anwar Al-Hussain TV - Satellite Network - The First English Shia Global Satellite Channel";
					break;		
			}
			$this->results = $title;
			
		}
		
	}


?>