<?php  
	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site("Feed");
			LiteFrame::NoTemplateLayout();			
			echo LiteFrame::$yAction['SiteData']['feed'];
		}
		
	}
?>