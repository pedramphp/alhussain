<?php 

	class ImageList extends SiteObject {
		
			
		public function __construct(){
			parent::__construct();
		}
		
		
		private static $IMAGE_LIST_SQL = "
			SELECT I.`image_thumb_url`,
				   I.`image_url`,
				   IC.`title` AS catName,
				   I.`entry_date`
			FROM `images` AS I
			JOIN `images_category` AS IC ON( I.`image_category_id` = IC.`id` )
			WHERE	I.`status` = 'active'
			AND		I.`image_category_id` = %d
			AND		IC.`status` = 'active'
			ORDER BY I.`entry_date` ASC
		";
	
		public function process(){
			
			$vars = LiteFrame::FetchGetVariable();
			if( !isset($vars['catId']) || !is_numeric($vars['catId'])||  !is_int((int)$vars['catId'])){ 
				Redirect::Action("404");
				return; 
			}
			$images = array();
			$result = DatabaseStatic::Query(sprintf(self::$IMAGE_LIST_SQL, $vars['catId']));
			while($row=DatabaseStatic::FetchAssoc($result)){
				if(empty($catName)){ $catName = $row['catName']; }
				$images[] = array(
					"original" => UrlModule::$IMAGE_GALLERY_ORIGINAL_PATH . $row['image_url'],
					"thumb"	=>	UrlModule::$IMAGE_GALLERY_THUMB_PATH . $row['image_thumb_url'],
					"date" => date('F jS, Y',strtotime($row['entry_date']))	
				);
			}
			
			$this->results = array("images"=>$images,"catName" => $catName);
			return $this->results;
		}
		
		
	}

?>