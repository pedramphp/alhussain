<?php 

	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site();
			
			
		  	 $resizeObj = new ImageResize('http://dev.jquerytoolkit.com/al/style/default/red/images/gallery/private/original/IMG_2771.jpg');
		  	 $size = getimagesize('http://dev.jquerytoolkit.com/al/style/default/red/images/gallery/private/original/IMG_2771.jpg');
		     $resizeObj->resizeImage($size[0], $size[1], 0); 
		     $resizeObj->saveImage('/var/www/vhosts/jquerytoolkit.com/subdomains/dev/httpdocs/al/style/default/red/images/gallery/private/original/IMG_2771xxxxx.jpg', 100);
		}
		
	}


?>