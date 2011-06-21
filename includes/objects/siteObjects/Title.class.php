<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "AlHussain TV";
			switch(SiteHelper::GetAction()){
				case "homepage":
					$title = "AlHussain TV - ANWAR ALHUSSAIN -SATALITE NETWORK - The First Shia Global Satalite Channel In English";
					break;				
				case "contact":
					$title = "Contact Alhussain TV - ANWAR ALHUSSAIN -SATALITE NETWORK - The First Shia Global Satalite Channel In English";
					break;		
			}
			$this->results = $title;
			
		}
		
	}


?>