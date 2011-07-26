<?php 
class Users{

	private static $loggedIn = false;
	
	private $username;
	private $fullname;
	private $status;
	private $email;
	private $entryDate;
	
	private static $userObj;
	
	public function __construct($username, $fullname, $status, $email, $entryDate ){
			 $this->username = $username;
			 $this->fullname = $fullname;
			 $this->status = $status;
			 $this->email = $email;
			 $this->entryDate = $entryDate;
	}
	
	public static function getInstance(){
		return 	self::$userObj;
	}
	
	public static function initialize(){
		if(self::isLoggedIn()){ return; }
		self::$userObj = new stdClass();
		if(isset($_SESSION['adminLoggedIn']) && isset($_SESSION['adminUsername']) && !empty($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminUsername'])){
			$username = htmlspecialchars(trim($_SESSION['adminUsername']));
			$userRecord = DatabaseStatic::$ah->LoadSingle_users(array('conditions'=>"username='".$username."' and status ='active'"));
			if(empty($userRecord)){
				self::logOut();
				return;
			}
			self::setUserObj($userRecord);
			self::$loggedIn = true;
		}else{
			self::logOut();
		}  
	}
	
	public static function isLoggedIn(){
		return self::$loggedIn;
	}
	
	public static function logOut(){
			unset($_SESSION['adminLoggedIn'],$_SESSION['adminUsername']);
			if(SiteHelper::GetAction() != 'login'){ Redirect::Action("login"); }
	}
	
	
	private static function setUserObj($userRecord){
		self::$userObj = new Users(	$userRecord->username,
									$userRecord->fullname,
									$userRecord->status,
									$userRecord->email,
									$userRecord->entry_date);
	}
	
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getFullname(){
		return $this->fullname;
	}
	
	public function getStatus(){
		return  $this->status;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getEntryDate(){
		return $this->entryDate;
	}
	
	
}

?>