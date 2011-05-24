<?php 

	class ImageList extends SiteObject {
		
			
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$request = LiteFrame::FetchRequestVariable();
			if( !(isset($request['catId']) && !empty($request['catId']) )){
				// we need to redirect to 404;
				return;
			}
			
			$imageThumbUrl = "style/default/red/images/gallery/private/thumb/";
			$imageOriginalUrl = "style/default/red/images/gallery/private/original/";
			$sources["cat_1"] = 
			array("IMG_2747.jpg",
						"IMG_2748.jpg",
						"IMG_2752.jpg",
						"IMG_2755.jpg",
						"IMG_2762.jpg",
						"IMG_2766.jpg",
						"IMG_2767.jpg",
						"IMG_2771.jpg",
						"IMG_2773.jpg"
			);
			
			$sources["cat_2"] = 
			array("IMG_1202.jpg",
						"IMG_1209.jpg",
						"IMG_1215.jpg",
						"IMG_1228.jpg",
						"IMG_1230.jpg",
						"IMG_1245.jpg",
						"IMG_1253.jpg",
						"IMG_1254.jpg",
						"IMG_1258.jpg",
						"IMG_1261.jpg"
			);
			
			$sources["cat_3"] = 
			array("A.H.-TV-021.jpg",
						"A.H.-TV-030.jpg",
						"A.H.-TV-033.jpg",
						"A.H.-TV-107.jpg",
						"A.H.-TV-108.jpg",
						"A.H.-TV-137.jpg",
						"A.H.-TV-151.jpg",
						"A.H.-TV-159.jpg",
						"A.H.-TV-160.jpg"
			);
			
			$sources["cat_4"] = 
			array("IMG_2566.jpg",
						"IMG_2575.jpg",
						"IMG_2576.jpg",
						"IMG_2577.jpg",
						"IMG_2579.jpg",
						"IMG_2600.jpg",
						"IMG_2609.jpg",
						"IMG_2612.jpg"
			);
			
			$sources["cat_5"] = 
			array("DSCN0055.jpg",
						"DSCN0058.jpg",
						"DSCN0059.jpg",
						"DSCN0073.jpg",
						"DSCN0083.jpg",
						"DSCN0085.jpg"
			);
			
			$sources["cat_6"] = 
			array("IMG_2723.jpg",
						"IMG_2724.jpg",
						"IMG_2729.jpg",
						"IMG_2730.jpg",
						"IMG_2740.jpg"
			);
			
			$images = array();
			if(!$sources["cat_".$request['catId']]){ return; }
			
			foreach( $sources["cat_".$request['catId']] as $key => $value){
				$images[$key]['original'] = 	$imageOriginalUrl.$value;
				$images[$key]['thumb'] =	$imageThumbUrl.$value;
			}
						
			$this->results = array("images"=>$images,"catName" => $this->getCatName($request['catId']));
			return $this->results;
		}
		
		private function getCatName( $catId ){
				
			$cat = array();
			$cat['1'] = "How do i";
			$cat['2'] = "Illumaination from the Qur'an";
			$cat['3'] = "Islamic Centers in America";
			$cat['4'] = "Journey of the Spirit";
			$cat['5'] = "Procession";
			$cat['6'] = "What's your story";
			
			return $cat[$catId];
			
			
		}
		
	}

?>