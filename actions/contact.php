<?php 

	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site();
			LiteFrame::ExternalJavascript('http://maps.google.com/maps/api/js?sensor=false');
			LiteFrame::IncludeLibraryJavascript('plugins/jquery.googlemap.js');
		}
		
	}
?>