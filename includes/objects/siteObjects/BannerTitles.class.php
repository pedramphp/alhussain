<?php 

	class BannerTitles extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$query= array();
			$action = SiteHelper::GetAction();
			switch($action){
				case "image": 
					$action = "imageGallery";	
					break;
				case "news": 	
					$action = "newsList";
					break;
				case "blog": 	
					$action = "blogs";
					break;	
					
			}
			$query['conditions'] = array('action'=>$action);
			
			$record = DatabaseStatic::$ah->LoadSingle_page_header($query);
			
			if(!empty($record)){
				$this->results = array(
					'title'=> $record->action_title,
					'subTitle'=> $record->sub_header
				);
			}else{
				$this->results = array(
					'title'=> 'Please Fill A Title',
					'subTitle'=> 'Please Fill A Sub Title'
				);
			}
		}
		
	}


?>