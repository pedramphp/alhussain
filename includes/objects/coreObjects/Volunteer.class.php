<?php 

class Volunteer {
	
	private $fullName;
	private $emailAddress;
	private $phoneNumber;
	private $work;
	private $city;
	private $request;
	private $message;
	private $time = array();
	private $interest = array();
	private $contactWay = array();
	
	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'Alhussain Tv Website - Volunteer';
	private static $to = 'info@alhussaintv.tv'; //info@alhussaintv.tv
	private static $admin = 'pedramphp@gmail.com';
	private static $subject = "New Message: AlhussainTV Website Volunteer Form";
	private static $emailLogo;
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
		
		$this->request = $request;
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/volunteer.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/userVolunteer.html';
		self::$emailLogo = LiteFrame::GetImagePath()."email/email_logo.png";
		
		foreach( $request as $key => $value ){
			$request[$key] = htmlspecialchars(mysql_real_escape_string(stripslashes(ucfirst( trim( $value ) ))));
			if(empty($request[$key]) && $key != 'emailAddress'){
				$request[$key] = self::$empty; 
			}
		}
		$this->fullName =		$request['volFullname'];
		$this->emailAddress =	$request['volEmail'];
		$this->phoneNumber = 	$request['volTel'];
		$this->work =			$request['volWork'];
		$this->city =			$request['volCity'];
		$this->message =		$request['valMessage'];	
		
		$this->buildTime();
		$this->buildInterest();
		$this->buildContactWay();
		
	}

	public function isValid(){
		return !empty($this->message) && filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName);
	}
	
	public function submit(){
		
		$message = file_get_contents(self::$emailTemplate);
		$arrayTplVars = array('{fullName}','{emailAddress}','{phoneNumber}',
							  '{work}', '{city}', '{time}','{interest}','{contactWay}','{message}','{emailLogo}');
		
		$time = (empty($this->time)) ? self::$empty : implode(" - ", $this->time);
		$interest = (empty($this->interest)) ? self::$empty : implode(" - ", $this->interest);
		$contactWay = (empty($this->contactWay)) ? self::$empty : implode(" - ", $this->contactWay);
		
		
		$arrayTplData = array($this->fullName, $this->emailAddress, 
							  $this->phoneNumber, $this->work, $this->city, 
							  $time, 
							  $interest, 
							  $contactWay, $this->message, self::$emailLogo );
		
		$message = str_replace($arrayTplVars, $arrayTplData, $message);
		
		$headers = 'From: '.self::$emailTitle.' <'.$this->emailAddress.'> ' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$userMessage = file_get_contents(self::$userEmailTemplate);
		$arrayTplVars = array('{fullName}','{message}','{emailLogo}');
		$arrayTplData = array($this->fullName, $this->message, self::$emailLogo);
		$userMessage = str_replace($arrayTplVars, $arrayTplData, $userMessage);
		
		$headersUser = 'From: '.self::$emailTitle.' <'.self::$to.'>'. "\r\n";
		$headersUser .= 'MIME-Version: 1.0' . "\r\n";
		$headersUser .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if( mail( self::$admin, self::$subject, $message, $headers ) && 
			mail( $this->emailAddress, self::$subject, $userMessage, $headersUser )
			&& mail( self::$to, self::$subject, $message, $headers ) ){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	private function buildTime(){
		$time = array(
			"valWeekdays" => "Weekdays",
			"valWeekends" => "Weekends",
			"valDayTime" => "Daytime",
			"valEvening" => "Evening"	
		);
		
		foreach( $time as $key => $val ){
			if(isset($this->request[$key])){
				$this->time[] = $val;
			}
		}
	}
	
	
	private function buildInterest(){

		$interests = array(
			"valHosting" => "Hosting",
			"valArt" => "Art/ Design",
			"valResearch" => "Research",
			"valTechnical" => "Technical",
			"valActing"	=> "Acting",
			"valWriter" => "Writer"
		);
		
		foreach( $interests as $key => $val ){
			if(isset($this->request[$key])){
				$this->interest[] = $val;
			}
		}
		
	}
	
	
	private function buildContactWay(){

		$contactWay = array(
			"valPhone" => "Phone",
			"valEmail" => "Email"	
		);
		
		foreach( $contactWay as $key => $val ){
			if(isset($this->request[$key])){
				$this->contactWay[] = $val;
			}
		}
		
		
	}
	
	
	
}
?>