<?php


/**
 *
 * Description
 *
 *
 * @name				PACKAGE NAME
 * @see					PACKAGE REFFER URL
 * @package			PACKAGE
 * @subpackage	SUBPACKAGE
 * @author			Mahdi Pedramrazi
 * @category		backend
 * @access			Mexo Programming Team
 * @version			1.0
 * @since			  May 22, 2010
 * @copyright		Mexo LLC
 *
 * @example
 * <code>
 * <?php
 *
 * ?>
 * </code>
 *
 */


class SiteSettings {
	
	public static  $tools;
	public function __construct(){}
	
	public function setTemplate(){
		
		LiteFrame::SetTemplateFolderName("default");
		LiteFrame::SetTemplateColorName("red");
		self::$tools= new Tools();
		
	}/* </ SetTemplate > */
	
	public function setTemplateColor(){
		
		if( LiteFrame::GetAction() !== 'homepage'){
			LiteFrame::IncludeStyle('pages.css','breadcrumb.css');
		}
		LiteFrame::IncludeStyle('footer.css');
		
	} /* </ SetTemplateColor > */
	
	public function setCoreJavascript(){
		
		LiteFrame::IncludeLibraryJavascript(array('plugins/rotate.js',
																							'plugins/gotop.js',
																							'plugins/jquery.ba-bbq.min.js',
																							'plugins/lazyload.js',
																							'plugins/plugins.js',
																							'plugins/jquery.carousel.js'));
		
		if( LiteFrame::GetAction() == "image" || LiteFrame::GetAction() == "homepage"){
				
			LiteFrame::IncludeLibraryJavascript('plugins/colorbox/jquery.colorbox-min.js');			
			LiteFrame::IncludeLibraryStyle('plugins/colorbox/colorbox.css');			
			
		}
		
		if( LiteFrame::GetAction() == "homepage"){
			LiteFrame::IncludeLibraryJavascript('plugins/niceZoom.js','plugins/jquery.cycle.lite.min.js','plugins/queryLoader/js/queryLoader.js');
			LiteFrame::IncludeLibraryStyle('plugins/queryLoader/css/queryLoader.css');
		}
		LiteFrame::IncludeJavascript('default.js');
		
		/*LiteFrame::IncludeLibraryJavascript('plugins/jquery.gotop.js');
		if( SiteHelper::GetAction() === 'tools' ){
			LiteFrame::ExternalJavascript('http://connect.facebook.net/en_US/all.js#appId=133202353404448&&amp;xfbml=1');
		}else{
			LiteFrame::ExternalJavascript('http://connect.facebook.net/en_US/all.js#xfbml=1');
		}
		*/
		
	} /* </ SetCoreJavascript > */
	
} /* </ SiteSettings > */
	
?>