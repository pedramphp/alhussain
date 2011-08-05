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
	public static $IMAGE_GALLERY_TEMP_PATH;
	public static $IMAGE_GALLERY_TEMP_FILE_PATH;
	public static $IMAGE_GALLERY_ORIGINAL_FILE_PATH;
	public static $IMAGE_GALLERY_THUMB_FILE_PATH;
	
	public static $BLOG_THUMB_FILE_PATH;
	public static $BLOG_THUMB_PATH;
	
	public static $NEWS_THUMB_FILE_PATH;
	public static $NEWS_THUMB_PATH;
	
	
	public function __construct(){
		
		self::$IMAGE_GALLERY_THUMB_PATH = self::getImagePath()."gallery/private/thumb/";
		self::$IMAGE_GALLERY_ORIGINAL_PATH = self::getImagePath()."gallery/private/original/";
		self::$IMAGE_GALLERY_TEMP_FILE_PATH = self::getImageFilePath()."temp/";
		self::$IMAGE_GALLERY_ORIGINAL_FILE_PATH = self::getImageFilePath()."gallery/private/original/";
		self::$IMAGE_GALLERY_THUMB_FILE_PATH = self::getImageFilePath()."gallery/private/thumb/";
		
		self::$VIDEO_GALLERY_THUMB_PATH = self::getImagePath()."videoGallery/";
		self::$EVENT_IMAGE_PATH = self::getImagePath()."events/";
		
		self::$BLOG_THUMB_FILE_PATH = self::getImageFilePath()."blog/thumb/";
		self::$BLOG_THUMB_PATH = self::getImagePath()."blog/thumb/";

		self::$NEWS_THUMB_FILE_PATH = self::getImageFilePath()."news/thumb/";
		self::$NEWS_THUMB_PATH = self::getImagePath()."news/thumb/";
		
	}
	
	public static function buildVimeoURL($vId){
		
		return "http://player.vimeo.com/video/".$vId."?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1";
	
	}
	
	
	private static function getImagePath(){
		return LiteFrame::getApplicationPath()."images/";
	}
	
	private static function getImageFilePath(){
		
		return LiteFrame::getFileSystemPath()."images/";
	}	
}
new UrlModule();

?>