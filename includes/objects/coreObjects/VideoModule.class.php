<?php 

class VideoModule{
	
	private static $ALL_VIDEO_CATEGORIES_SQL = "
	SELECT 
		VC.`id` AS catId,
	 	VC.`title` AS catTitle,
	 	VC.`description` AS catDesc,
	 	V.`image_thumb_url` AS vThumbUrl,
	 	V.`id` AS vId,
 		V.`title` AS vTitle,
	    V.`description` AS vDesc,
	    V.`entry_date` AS vEntryDate,
	    V.`video_url` AS videoUrl
	    
	FROM videos_category AS VC
	JOIN videos AS V ON ( V.`video_category_id` = VC.`id` AND V.`status` = 'active')
	WHERE VC.`status` = 'active'
	ORDER BY VC.`title` ASC, V.`title` ASC
	";
	
	private static $ALL_VIDEOS_SQL = "
	SELECT 
		VC.`id` AS catId,
	 	VC.`title` AS catTitle,
	 	VC.`description` AS catDesc,
	 	V.`image_thumb_url` AS vThumbUrl,
	 	V.`id` AS vId,
 		V.`title` AS vTitle,
	    V.`description` AS vDesc,
	    V.`entry_date` AS vEntryDate,
	    V.`video_url` AS videoUrl
	    
	FROM videos AS V
	JOIN videos_category  AS VC ON ( V.`video_category_id` = VC.`id` AND VC.`status` = 'active')
	WHERE V.`status` = 'active'
	ORDER BY V.`entry_date` DESC
	";
	
	private static $LIMIT_SQL = " LIMIT %d";
	
	private static $VIDEOS_IN_CATEGORY_SQL = "
	SELECT 
		VC.`id` AS catId,
	 	VC.`title` AS catTitle,
	 	VC.`description` AS catDesc,
	 	V.`image_thumb_url` AS vThumbUrl,
	 	V.`id` AS vId,
 		V.`title` AS vTitle,
	    V.`description` AS vDesc,
	    V.`entry_date` AS vEntryDate,
	    V.`video_url` AS videoUrl
	    
	FROM videos AS V
	JOIN videos_category AS VC ON ( V.`video_category_id` = VC.`id` AND VC.`status` = 'active')
	WHERE	V.`status` = 'active' 
	AND 	V.`video_category_id` = %d
	GROUP BY V.`id`
	ORDER BY V.`entry_date` DESC
	";


	
	private static $VIDEO_SQL= "
	SELECT 
		VC.`id` AS catId,
	 	VC.`title` AS catTitle,
	 	VC.`description` AS catDesc,
	 	V.`image_thumb_url` AS vThumbUrl,
	 	V.`id` AS vId,
 		V.`title` AS vTitle,
	    V.`description` AS vDesc,
	    V.`entry_date` AS vEntryDate,
	    V.`video_url` AS videoUrl
	    
	FROM videos AS V
	JOIN videos_category AS VC ON ( V.`video_category_id` = VC.`id` AND VC.`status` = 'active')
	WHERE	V.`status` = 'active' 
	AND 	V.`id` = %d
	LIMIT 1
	";	

	
	public function __construct(){}
	
	
	/**
	 * we will be returning all active products within active categories
	 * 
	 * 
	 * video limit per category by default is 0 which means that there is no limitation on how many products
	 * gets return by each category.
	 * 
	 * @param boolean $videoLimitPerCategory
	 */
	public function getAllVideosSortedByCategory( $videoLimitPerCategory = 0 ){
		
		$records = array();
		$result = DatabaseStatic::Query(self::$ALL_VIDEO_CATEGORIES_SQL);
		while($row=DatabaseStatic::FetchAssoc($result)){
			if(!isset($records[$row['catId']])){
				$records[$row['catId']] = array(
					'catUrl' => SiteHelper::getActionUrl('video', array('videoCatId' => $row['catId'] ) ),
					'catDesc' => $row['catDesc'],
					'catTitle' => $row['catTitle'],
					'videos' => array()
				);
			}
			if($videoLimitPerCategory != 0 && sizeof($records[$row['catId']]['videos']) >= $videoLimitPerCategory){ continue; }
			$records[$row['catId']]['videos'][] = array(
				'vThumbUrl' => $row['vThumbUrl'],
				'vTitle' => $row['vTitle'],
				'vDesc' => $row['vDesc'],
				'videoUrl' => VimeoModule::getVimeoUrl( $row['videoUrl'] ),
				'vUrl' => SiteHelper::getActionUrl('video', array('videoId' => $row['vId'] ) ),
				'vDate' => ModuleHelper::getFriendlyShortDate($row['vEntryDate']),
				'plays' => VimeoModule::getNumberOfPlays( $row['videoUrl'] ),
				'duration' => ModuleHelper::getFriendlyTimeByMinute(VimeoModule::getDurationByMinute($row['videoUrl']))
			);
		}
		return $records;
		
	}
	
	/**
	 * returns list of products sorted by entry date
	 * @param Integer $catId
	 */
	public function getAllVideosByCategoryId( $catId ){
		$records = array();
		$result = DatabaseStatic::Query(sprintf(self::$VIDEOS_IN_CATEGORY_SQL, $catId));
		while($row=DatabaseStatic::FetchAssoc($result)){
			if(empty($records)){
				$records = array(
					'catUrl' => SiteHelper::getActionUrl('video', array('videoCatId' => $row['catId'] ) ),
					'catDesc' => $row['catDesc'],
					'catTitle' => $row['catTitle'],
					'videos' => array()
				);
			}
			$records['videos'][] = array(
				'vThumbUrl' => $row['vThumbUrl'],
				'vTitle' => $row['vTitle'],
				'vDesc' => $row['vDesc'],
				'videoUrl' => VimeoModule::getVimeoUrl( $row['videoUrl'] ),
				'vUrl' => SiteHelper::getActionUrl('video', array('videoId' => $row['vId'] ) ),
				'vDate' => ModuleHelper::getFriendlyShortDate($row['vEntryDate']),
				'plays' => VimeoModule::getNumberOfPlays( $row['videoUrl'] ),
				'duration' => ModuleHelper::getFriendlyTimeByMinute(VimeoModule::getDurationByMinute($row['videoUrl']))
			);
		}
		return $records;		
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param integer $videoId
	 */
	public function getVideoById($videoId){
		$record = array();
		$result = DatabaseStatic::Query(sprintf(self::$VIDEO_SQL, $videoId));
		if($row = DatabaseStatic::FetchAssoc($result)){
			$record = array(
						'catUrl' => SiteHelper::getActionUrl('video', array('videoCatId' => $row['catId'] ) ),
						'catDesc' => $row['catDesc'],
						'catTitle' => $row['catTitle'],
						'vThumbUrl' => $row['vThumbUrl'],
						'vTitle' => $row['vTitle'],
						'vDesc' => $row['vDesc'],
						'videoUrl' => VimeoModule::getVimeoUrl( $row['videoUrl'] ),
						'vUrl' => SiteHelper::getActionUrl('video', array('videoId' => $row['vId'])),
						'vDate' => ModuleHelper::getFriendlyShortDate($row['vEntryDate']),
						'plays' => VimeoModule::getNumberOfPlays( $row['videoUrl'] ),
						'duration' => ModuleHelper::getFriendlyTimeByMinute(VimeoModule::getDurationByMinute($row['videoUrl']))
			);
		}
		return $record;		
	}
	
	
	public function getAllVideos($limit=0){

		$records = array();
		$query = (empty($limit)) 
			? self::$ALL_VIDEOS_SQL :  
			self::$ALL_VIDEOS_SQL.sprintf(self::$LIMIT_SQL,$limit);
			
		$result = DatabaseStatic::Query($query);
		while($row=DatabaseStatic::FetchAssoc($result)){
			$records[] = array(
						'catUrl' => SiteHelper::getActionUrl('video', array('videoCatId' => $row['catId'] ) ),
						'catDesc' => $row['catDesc'],
						'catTitle' => $row['catTitle'],
						'vThumbUrl' => $row['vThumbUrl'],
						'vTitle' => $row['vTitle'],
						'vDesc' => $row['vDesc'],
						'videoUrl' => VimeoModule::getVimeoUrl( $row['videoUrl'] ),
						'vUrl' => SiteHelper::getActionUrl('video', array('videoId' => $row['vId'])),
						'vDate' => ModuleHelper::getFriendlyShortDate($row['vEntryDate']),
						'plays' => VimeoModule::getNumberOfPlays( $row['videoUrl'] ),
						'duration' => ModuleHelper::getFriendlyTimeByMinute(VimeoModule::getDurationByMinute($row['videoUrl']))
			);
		}
		return $records;
	}
	
	
}

?>