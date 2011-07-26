<?php 

	class User extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
		
			$this->results = Users::getInstance();
			
		}
		
	}


?>