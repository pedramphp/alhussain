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
 * @since			  Dec 21, 2010
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
		
		//LiteFrame::SetTemplateFolderName("default");
		//LiteFrame::SetTemplateColorName("dark");
		self::$tools= new Tools();
		
	}/* </ SetTemplate > */
	
	public function setTemplateColor(){
		
		
	} /* </ SetTemplateColor > */
	
	public function setCoreJavascript(){
		//if( SiteHelper::GetAction() !== 'login' ){
			LiteFrame::IncludeLibraryJavascript('facebox.js'/*,'jquery.wysiwyg.js'*/,'simpla.jquery.configuration.js');
			LiteFrame::IncludeStyle('default.css','invalid.css','red.css');
			LiteFrame::ExternalJavascript('http://js.nicedit.com/nicEdit-latest.js');
		//}
		/*LiteFrame::IncludeLibraryJavascript('plugins/jquery.gotop.js');
		LiteFrame::IncludeJavascript('default.js');
		if( SiteHelper::GetAction() === 'tools' ){
			LiteFrame::ExternalJavascript('http://connect.facebook.net/en_US/all.js#appId=133202353404448&&amp;xfbml=1');
		}else{
			LiteFrame::ExternalJavascript('http://connect.facebook.net/en_US/all.js#xfbml=1');
		}
		*/
		
	} /* </ SetCoreJavascript > */
	
} /* </ SiteSettings > */
	
?>