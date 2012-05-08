<?php 

	class VimeoModule{
		
		public function __construct(){}
		
		private static $VIMEO_VIDEO_URL = 'http://vimeo.com/api/v2/video/%d.php';
		
		public static function getMediumThumbnailUrl($videoId){
			
			$url = sprintf(self::$VIMEO_VIDEO_URL,$videoId);
			$data = self::getVimeoGenealInfo($url);
			return $data['thumbnail_medium'];
		}
		
		private static function getVimeoGenealInfo($url){

			$finaldata = unserialize(file_get_contents($url));
			
			return $finaldata[0];
			
		}
		
		public static function getVimeoUrl($vimeoId, $autoplay=false){
			
			$autoplay = ($autoplay)?1:0;
			return "http://player.vimeo.com/video/".$vimeoId."?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=".$autoplay;
		
		}
		
	}
?>
