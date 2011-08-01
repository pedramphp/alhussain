<?php 

	class ImageGallery extends SiteObject {
		
		
		private static $IMAGE_CATEGORY_LIST_SQL = "
			SELECT	IC.`id`,
					IC.`title`,
					IC.`entry_date` 
			FROM `images_category` AS IC
			JOIN images AS I ON ( I.`image_category_id` = IC.`id` AND I.`status` = 'active')
			WHERE  IC.`status` = 'active'
			GROUP BY IC.`id`
			ORDER BY IC.`entry_date` DESC
		";
		
		private static $IMAGE_COUNT_SQL = "
			SELECT COUNT(*) AS counted
			FROM `images` AS I
			WHERE	I.`status` = 'active'
			AND		I.`image_category_id` = %d
		";
		
		private static $IMAGE_LIST_SQL = "
			SELECT I.`image_thumb_url`
			FROM `images` AS I
			WHERE	I.`status` = 'active'
			AND		I.`image_category_id` = %d
			LIMIT 4
		";
		
			
		public function __construct(){
			parent::__construct();
		}
		
		
		private function getCategorySize( $catId ){
			
			$result = DatabaseStatic::Query(sprintf(self::$IMAGE_COUNT_SQL,$catId));
			$row=DatabaseStatic::FetchAssoc($result);
			return $row['counted'];

		}
		
		private function getImageList( $catId ){
			
			$result = DatabaseStatic::Query(sprintf(self::$IMAGE_LIST_SQL, $catId));
			$images = array();
			while($row=DatabaseStatic::FetchAssoc($result)){
				$images[] = UrlModule::$IMAGE_GALLERY_THUMB_PATH . $row['image_thumb_url'];
			}
			return $images;
			

		}
		
		public function process(){
			
			$imageUrl = UrlModule::$IMAGE_GALLERY_THUMB_PATH;
			$cats = array();
			
			$result = DatabaseStatic::Query(self::$IMAGE_CATEGORY_LIST_SQL);
			while($row=DatabaseStatic::FetchAssoc($result)){
				
				$cats[] = array(
					"catId"	=> $row['id'],	
					"categoryName"	=> $row['title'],
					"size" => $this->getCategorySize($row['id']),
					"images" => $this->getImageList($row['id']),
					"date" =>date('F jS, Y',strtotime($row['entry_date']))
				);
			}
			
			$this->results = $cats;
			
		}
	}

?>