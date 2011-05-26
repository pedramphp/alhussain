<?php 

	class Homepage extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$images = array();
			$imageThumbUrl = "style/default/red/images/gallery/private/thumb/";
			$imageOriginalUrl = "style/default/red/images/gallery/private/original/";
			$sources = 
			array("IMG_2747.jpg",
						"IMG_2748.jpg",
						"IMG_2752.jpg",
						"IMG_2755.jpg",
						"IMG_2762.jpg",
						"IMG_2766.jpg",
						"IMG_2767.jpg",
						"IMG_2771.jpg",
						"IMG_2773.jpg",
						"IMG_1202.jpg",
						"IMG_1209.jpg",
						"IMG_1215.jpg",
						"IMG_1228.jpg",
						"IMG_1230.jpg",
						"IMG_1245.jpg",
						"IMG_1253.jpg",
						"IMG_1254.jpg",
						"IMG_1258.jpg",
						"IMG_1261.jpg",
						"A.H.-TV-021.jpg",
						"A.H.-TV-030.jpg",
						"A.H.-TV-033.jpg",
						"A.H.-TV-107.jpg",
						"A.H.-TV-108.jpg",
						"A.H.-TV-137.jpg",
						"A.H.-TV-151.jpg",
						"A.H.-TV-159.jpg",
						"A.H.-TV-160.jpg",
						"IMG_2566.jpg",
						"IMG_2575.jpg",
						"IMG_2576.jpg",
						"IMG_2577.jpg",
						"IMG_2579.jpg",
						"IMG_2600.jpg",
						"IMG_2609.jpg",
						"IMG_2612.jpg",
						"DSCN0055.jpg",
						"DSCN0058.jpg",
						"DSCN0059.jpg",
						"DSCN0073.jpg",
						"DSCN0083.jpg",
						"DSCN0085.jpg",
						"IMG_2723.jpg",
						"IMG_2724.jpg",
						"IMG_2729.jpg",
						"IMG_2730.jpg",
						"IMG_2740.jpg"
			);
			
			foreach( $sources as $key => $value){
				$images[$key]['thumb'] =		$imageThumbUrl.$value;
				$images[$key]['original'] =	$imageOriginalUrl.$value;
			}
			$this->results = array('imageThumbs' => $images);;
			
		}
		
	}


?>