<?php 

	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	
	class LiteFrameAction{
		
		public function __construct(){
			$site = new Site("Blogs");
			LiteFrame::IncludeStyle('blog.css');
			LiteFrame::IncludeStyle('pages.css');
			
		}
		
	}
?>