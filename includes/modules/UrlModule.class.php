<?php


/**
 *
 * Description
 *
 *
 * @name			PACKAGE NAME
 * @see				PACKAGE REFFER URL
 * @package			PACKAGE
 * @subpackage		SUBPACKAGE
 * @author			Mahdi Pedramrazi
 * @category		backend
 * @access			Mexo Programming Team
 * @version			1.0
 * @since			July 22, 2011
 * @copyright		Mexo INC
 *
 * @example
 * <code>
 * <?php
 *
 * ?>
 * </code>
 *
 */
class UrlModule {
	
	public static $IMAGE_GALLERY_THUMB_PATH;
	public static $IMAGE_GALLERY_ORIGINAL_PATH;
	public static $VIDEO_GALLERY_THUMB_PATH;
	public static $EVENT_IMAGE_PATH;
	
	public function __construct(){
		
		self::$IMAGE_GALLERY_THUMB_PATH = LiteFrame::getImagePath()."gallery/private/thumb/";
		self::$IMAGE_GALLERY_ORIGINAL_PATH = LiteFrame::getImagePath()."gallery/private/original/";
		self::$VIDEO_GALLERY_THUMB_PATH = LiteFrame::getImagePath()."videoGallery/";
		self::$EVENT_IMAGE_PATH = LiteFrame::getImagePath()."events/";
	}
	
	
	public static function buildVimeoURL($vId){
		
		return "http://player.vimeo.com/video/".$vId."?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1";
	
	}
	
}
new UrlModule();

?>