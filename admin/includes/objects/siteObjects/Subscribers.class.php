<?php 

class Subscribers extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	public function process(){
		$this->results = SubscribersCore::getSubscribers();
	}
		
}
?>