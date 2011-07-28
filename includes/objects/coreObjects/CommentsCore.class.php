<?php 

class CommentsCore{
	
	private $fullname;
	private $email;
	private $gender;
	private $message;
	
	public function __construct($request){
		if($this->isValid($request)){
			if(!$this->store()){
				throw new JSONRPCException("please try again");
			}	
		}else{
			throw new JSONRPCException("please fill up the empty fields");
		}		
	}

	private function isValid($request){
		
		if(isset(	$request['commentFullname'],
					$request['commentEmail'],
					$request['commentGender'],
					$request['commentMessage']
			)	&& !empty($request['commentFullname']) 
				&& !empty($request['commentEmail']) 
				&& !empty($request['commentGender']) 
				&& !empty($request['commentMessage']) 
		){		
		
			
			foreach( $request as $key => $value ){
				$request[$key] = htmlspecialchars(mysql_real_escape_string(stripslashes(trim( $value ))));
			}
			
			
			if(!filter_var($request['commentEmail'], FILTER_VALIDATE_EMAIL)){
			
				return false;
			}
				
			$this->fullname = $request['commentFullname'];
			$this->email = $request['commentEmail'];
			$this->gender = $request['commentGender'];
			$this->message = $request['commentMessage'];
			return true;
		}else{	
			return false;
		}
		
	}
	
	private function store(){
		
		$record = DatabaseStatic::$ah->Create_comments();
		$record->fullname = $this->fullname;
		$record->email = $this->email;
		$record->gender = $this->gender;
		$record->status = 'pending';
		$record->comment = $this->message;
		$record->entry_date = date("y-m-d H:i:s", time()); 
		$record->updated_date = date("y-m-d : H:i:s", time()); 

		if($record->Save()){
			return true;
		}else{
			return false;
		}
	}	
	
}

?>