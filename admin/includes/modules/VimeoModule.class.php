<?php 

	class VimeoModule{
		
		public function __construct(){}
		
		private static $VIMEO_VIDEO_URL = 'vimeo.com/api/v2/video/%d.php';
		
		public static function getMediumThumbnailUrl($videoId){
			
			$url = sprintf(self::$VIMEO_VIDEO_URL,$videoId);
			$data = self::getVimeoGenealInfo($url);
			return $data['thumbnail_medium'];
			
		}
		
		private static function getVimeoGenealInfo($url){

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			// grab URL and pass it to the browser
			$data = curl_exec($ch);
			curl_close($ch);
			$finaldata = unserialize($data);
			return $finaldata[0];
			
		}
		
	}

?>