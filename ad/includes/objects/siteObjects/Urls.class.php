<?php 

	class Urls extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$this->results['siteUrl'] = dirname(LiteFrame::GetApplicationPath()); 
			
		}
		
	}


?>