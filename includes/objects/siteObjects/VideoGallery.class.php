<?php 

	class VideoGallery extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){

			$request = LiteFrame::FetchGetVariable();
			$this->results['singleVideo'] = 0;
			if(Request::issetFields(array('videoId'),'GET')  && Request::isNumeric($request['videoId'])){
				$video = $this->processVideo($request['videoId']);
				if(empty($video)){
					Redirect::Action("404");
				}
				$videoInst = new VideoModule();
				$this->results['video'] = $video;
				$this->results['singleVideo'] = 1;
				$this->results['latestVideos'] = $videoInst->getAllVideos(3);
				return;
			}
			
			$video = new VideoModule();
			$videoCategories = $video->getAllVideosSortedByCategory(5);
			$activeCatId = null;
			if( Request::issetFields(array('videoCatId'),'GET') && Request::isNumeric($request['videoCatId'])){
				$activeCategory = $video->getAllVideosByCategoryId($request['videoCatId']);
				if(empty($activeCategory)){
					Redirect::Action("404");
				}
				$activeCatId = $request['videoCatId'];
			}else{ 
				$cat= each($videoCategories);
				$activeCatId = $cat['key'];
				$activeCategory = $video->getAllVideosByCategoryId($activeCatId);
			}
			$videoCategories[$activeCatId]['active'] = true;
			
			$this->results['categories'] = $videoCategories;
			$this->results['activeCategory'] = $activeCategory;
		}
		
		
		private function processVideo($videoId){
			
			$video = new VideoModule();
			return $video->getVideoById($videoId);
		}
		
	}


?>