<?php 

	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site("Blog");
			LiteFrame::IncludeStyle('pages.css');
			
		}
		
	}
?>