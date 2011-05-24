<?php 

	class ImageGallery extends SiteObject {
		
			
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$imageUrl = "style/default/red/images/gallery/private/thumb/";
			$cats = array();
			$cats[] = array(
				"catId"	=> 1,	
				"categoryName"	=> "How do i",
				"size" => 9,
				"images" => array($imageUrl."IMG_2747.jpg",
													$imageUrl."IMG_2748.jpg",
													$imageUrl."IMG_2752.jpg",
													$imageUrl."IMG_2755.jpg")
			);
			
			$cats[] = array(
				"catId"	=> 2,	
				"categoryName"	=> "Illumaination from the Qur'an",
				"size" => 10,
				"images" => array($imageUrl."IMG_1202.jpg",
										$imageUrl."IMG_2748.jpg",
										$imageUrl."IMG_1230.jpg",
										$imageUrl."IMG_1253.jpg")
			);
			$cats[] = array(
				"catId"	=> 3,	
				"categoryName"	=> "Islamic Centers in America",
				"size" => 9,
				"images" => array($imageUrl."A.H.-TV-021.jpg",
										$imageUrl."A.H.-TV-030.jpg",
										$imageUrl."A.H.-TV-033.jpg",
										$imageUrl."A.H.-TV-107.jpg")
			);
			$cats[] = array(
				"catId"		=> 4,
				"categoryName"	=> "Journey of the Spirit",
				"size" => 8,
				"images" => array($imageUrl."IMG_2566.jpg",
										$imageUrl."IMG_2575.jpg",
										$imageUrl."IMG_2576.jpg",
										$imageUrl."IMG_2577.jpg")
			);
			$cats[] = array(
				"catId"	=> 5	,
				"categoryName"	=> "Procession",
				"size" => 6,
				"images" => array($imageUrl."DSCN0055.jpg",
										$imageUrl."DSCN0058.jpg",
										$imageUrl."DSCN0059.jpg",
										$imageUrl."DSCN0073.jpg")
			);
			$cats[] = array(
				"catId"	=> 6,	
				"categoryName"	=> "What's your story",
				"size" => 4,
				"images" => array($imageUrl."IMG_2723.jpg",
										$imageUrl."IMG_2724.jpg",
										$imageUrl."IMG_2729.jpg",
										$imageUrl."IMG_2730.jpg")
			);
			
			$this->results = $cats;
			
			return $this->results;
		}
	}

?>