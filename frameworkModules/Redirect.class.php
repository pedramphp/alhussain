<?php 


class Redirect {
	
	public static function Action( $action = 'homepage', $querystring = array() ){
		
		$url = LiteFrame::BuildActionUrl( $action );
		if(sizeof($querystring) > 0 ){ $url .= '&'.http_build_query($querystring, '&'); }
		self::Url( $url );
		
	}/* </ Action > */	

	
	
	public static function Url( $url ){
		
		header( 'Location: ' . $url );
		
	}/* </ Url > */	
	
	
	
	public static function facebookComment(){
		
		$get = LiteFrame::FetchGetVariable();
		unset($get['fb_comment_id']);
		$action = $get['action'];
		unset($get['action']);
		self::Action($action,$get);
	
	}/* </ facebookComment > */	
	
	
}/* </ Redirect > */	

?>