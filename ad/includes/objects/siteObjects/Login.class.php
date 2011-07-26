<?php 

class Login extends SiteObject{
	
	public function __construct(){
			parent::__construct();
	}
	
	private static $WRONG_USERNAME_PASSWORD = 'Warning: Please enter you username and password';
	
	private static $INVALID_REQUEST = "Warning: Please fill your username and password";
	
	
	public function process(){
			if(Users::isLoggedIn()){
				Redirect::Action("dashboard");
			}
			$request = LiteFrame::FetchPostVariable();
			if(isset($request['username'],$request['password'])){
				
				if(empty($request['username']) || empty($request['password']) || strlen($request['username']) > 30 ){
					$this->results['errorMsg'] = self::$INVALID_REQUEST;
					return;
				} 
				$username = htmlspecialchars(trim($request['username']));
				$password = htmlspecialchars(trim($request['password']));
				$userRecord = DatabaseStatic::$ah->LoadSingle_users(array('conditions'=>"username='".$username."' and status ='active'"));
				if(empty($userRecord) || hash('sha256', $userRecord->salt.hash('sha256', $password)) != $userRecord->password ){
					$this->results['errorMsg'] = self::$WRONG_USERNAME_PASSWORD;
					return;
				}
			  	$_SESSION['adminUsername'] = $username;  
		     	$_SESSION['adminLoggedIn'] = 1;  
		     	Redirect::Action("dashboard");
		
			}
	}
	/* OUR HASHING ALGORITHM
	 	http://tinsology.net/2009/06/creating-a-secure-login-system-the-right-way/
		$hash = hash('sha256', 'YOUR PASS');
		function createSalt(){
		    $string = md5(uniqid(rand(), true));
		    return substr($string, 0, 3);
		}
		$salt = createSalt();
		$hash = hash('sha256', $salt . $hash);
	*/

}