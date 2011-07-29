<?php 

class SubscriberCore{
	
	private $email;
	
	private static $EMPTY_FEILD_ERROR = "Please fill up the text field";
	
	private static $INVALID_EMAIL_ERROR = "You entered an invalid email address please try again";
	
	private static $EMAIL_EXIST_ERROR = "The email address you entered already exists in our system";
	
	private static $DB_ERROR = "Unexpected error: please try again";
	
	public function __construct($request){
		
		try{
			$this->store($request);	
		}catch(Exception $e){
			throw new JSONRPCException($e->getMessage());
		}	
		
	}

	private function isValid($request){
		
		if(isset($request['subscribeEmail']) && !empty($request['subscribeEmail'])){		
			
			$request['subscribeEmail'] = htmlspecialchars(mysql_real_escape_string(stripslashes(trim( $request['subscribeEmail'] ))));
			
			if(!filter_var($request['subscribeEmail'], FILTER_VALIDATE_EMAIL)){
				throw new Exception(self::$INVALID_EMAIL_ERROR);
			}
			$this->email = $request['subscribeEmail'];
		}else{	
			throw new Exception(self::$EMPTY_FEILD_ERROR);
		}
		
	}
	
	private function store($request){
		$this->isValid($request);
		$existingRecord = DatabaseStatic::$ah->LoadSingle_subscribers(array("conditions"=>"email='".$this->email."'"));
		if(!empty($existingRecord)){
			throw new Exception(self::$EMAIL_EXIST_ERROR);
			return false;
		}
		$record = DatabaseStatic::$ah->Create_subscribers();
		$record->email = $this->email;
		$record->ip_address = sprintf("%u", ip2long(long2ip(ip2long($_SERVER['REMOTE_ADDR']))));
		$record->entry_date = date("y-m-d H:i:s", time()); 
		$record->updated_date = date("y-m-d : H:i:s", time()); 
		if($record->Save()){
			return true;
		}else{
			throw new Exception(self::$DB_ERROR);
			return false;
		}
		
	}	
	
}

?>