<?php 

	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site("Event");
			LiteFrame::IncludeLibraryJavascript('jquery/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js');
			LiteFrame::IncludeLibraryStyle('jquery/jquery-ui-1.8.14.custom/css/blitzer/jquery-ui-1.8.14.custom.css');
		}
		
	}


?>