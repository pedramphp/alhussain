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
																							'plugins/borderRadius.js',
																							'plugins/gotop.js',
																							'plugins/jquery.ba-bbq.min.js',
																							'plugins/plugins.js'));
		
		if( LiteFrame::GetAction() == "image"){
				
			LiteFrame::IncludeLibraryJavascript('plugins/colorbox/jquery.colorbox-min.js');			
			LiteFrame::IncludeLibraryStyle('plugins/colorbox/colorbox.css');			
			
		}
		
		LiteFrame::IncludeJavascript('default.js');
		LiteFrame::IncludeJavascript('homepage.js');
		
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