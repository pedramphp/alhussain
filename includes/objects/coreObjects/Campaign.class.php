<?php 

class Campaign {
	
	private $fullName;
	private $emailAddress;
	private $phoneNumber;
	private $request;
	private $message;
	private $videoLink;
	private $time = array();
	
	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'Alhussain Tv Website - Video Campaign Form';
	//private static $to = 'info@alhussaintv.tv'; //info@alhussaintv.tv
	private static $to = 'pedramphp@gmail.com'; //info@alhussaintv.tv
	private static $admin = 'pedramphp@gmail.com';
	private static $subject = "New Message: AlhussainTV Video Campaign Form";
	private static $emailLogo;
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
		
		$this->request = $request;
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/campaign.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/userCampaign.html';
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
		$this->videoLink =		$request['videoLink'];
		$this->message =		$request['valMessage'];	
		

	}

	public function isValid(){
		return !empty($this->message) && filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName);
	}
	
	public function submit(){
		
		$message = file_get_contents(self::$emailTemplate);
		$arrayTplVars = array('{fullName}','{emailAddress}','{phoneNumber}','{videoLink}','{message}','{emailLogo}');
		
		
		
		$arrayTplData = array($this->fullName, $this->emailAddress, 
							  $this->phoneNumber, $this->videoLink, $this->message, self::$emailLogo );
		
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
	
	
	
	
	
	
}
?>