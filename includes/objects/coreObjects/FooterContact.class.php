<?php 

class FooterContact {
	
	private $fullName;
	private $emailAddress;
	private $message;
	
	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'Alhussain Tv Website';
	private static $to = 'pedramphp@gmail.com'; //info@alhussaintv.tv
	private static $admin = 'pedramphp@gmail.com';
	private static $subject = "New Message: AlhussainTV Website Contact Us - Footer";
	private static $emailLogo;
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/contactFooter.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/userContact.html';
		self::$emailLogo = LiteFrame::GetImagePath()."email/email_logo.png";
		
		foreach( $request as $key => $value ){
			$request[$key] = htmlspecialchars(mysql_real_escape_string(stripslashes(ucfirst( trim( $value ) ))));
			if(empty($request[$key]) && $key != 'emailAddress'){
				$request[$key] = self::$empty; 
			}
		}
		$this->fullName =		$request['footerFullname'];
		$this->emailAddress =	$request['footerEmail'];
		$this->message =		$request['footerMessage'];	
	}

	public function isValid(){
		return !empty($this->message) && filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName);	
	}
	
	public function submit(){
		
		$message = file_get_contents(self::$emailTemplate);
		$arrayTplVars = array('{fullName}','{emailAddress}','{message}','{emailLogo}');
		$arrayTplData = array($this->fullName, $this->emailAddress, $this->message, self::$emailLogo );
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