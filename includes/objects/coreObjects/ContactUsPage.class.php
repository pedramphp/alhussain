<?php 

class ContactUsPage {
	
	private $fullName;
	private $emailAddress;
	private $phoneNumber;
	private $website;
	private $rate;
	private $reason;
	private $message;
	
	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'Alhussain Tv Website';
	private static $to = 'info@alhussaintv.tv'; //info@alhussaintv.tv
	private static $admin = 'pedramphp@gmail.com';
	private static $subject = "New Message: AlhussainTV Website Contact Us Form";
	private static $emailLogo;
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/contact.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/userContact.html';
		self::$emailLogo = LiteFrame::GetImagePath()."email/email_logo.png";
		
		foreach( $request as $key => $value ){
			$request[$key] = htmlspecialchars(mysql_real_escape_string(stripslashes(ucfirst( trim( $value ) ))));
			if(empty($request[$key]) && $key != 'emailAddress'){
				$request[$key] = self::$empty; 
			}
		}
		$this->fullName =		$request['contactFullname'];
		$this->emailAddress =	$request['contactEmail'];
		$this->phoneNumber = 	$request['contactTel'];
		$this->website =		$request['contactWeb'];
		$this->rate =			$request['contactQuestion'];
		$this->reason =			$request['contactReason'];
		$this->message =		$request['contactMessage'];	
	}

	public function isValid(){
		$website = ( $this->website != self::$empty) ? filter_var ($this->website, FILTER_VALIDATE_URL) : true;
		return !empty($this->message) && filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName) && $website;
	}
	
	public function submit(){
		
		$message = file_get_contents(self::$emailTemplate);
		$arrayTplVars = array('{fullName}','{emailAddress}','{phoneNumber}','{website}', '{rate}','{reason}','{message}','{emailLogo}');
		$arrayTplData = array($this->fullName, $this->emailAddress, $this->phoneNumber, $this->website, $this->rate, $this->reason, $this->message, self::$emailLogo );
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
			mail( self::$to, self::$subject, $message, $headers ) &&
			mail( $this->emailAddress, self::$subject, $userMessage, $headersUser )){
			return true;
		}else{
			return false;
		}
		
	}
	
}
?>