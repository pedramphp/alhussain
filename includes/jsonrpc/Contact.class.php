<?php 
	/**
	 * Define a custom exception class
	 */
	class JSONRPCException extends Exception{
	    // Redefine the exception so message isn't optional
	    public function __construct($message, $code = 0) {
	        // some code
	    
	        // make sure everything is assigned properly
	        parent::__construct($message, $code);
	    }
	
	    // custom string representation of object
	    public function __toString() {
	        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	    }
	
	    public function customFunction() {
	        echo "A custom function for this type of exception\n";
	    }
	}
	
	class Contact{
		
		public function __construct(){
		
		}
		
		public function contactUs( $params ){
			
			$message = '';
			$cntuspage = new ContactUsPage($params);
			if( $cntuspage->isValid()){
				if( $cntuspage->submit()){
					$error = false;
					$success = true;						
				}else{
					$message = 'please try again';
					$error = true;
					$success = false;							
				}
			}else{
				$error = true;
				$success = false;
				$message = 'please fill up the empty fields';
			}
			return array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $message
			);
		}
		
		public function footerContact( $params ){
			$message = '';
			$cnt = new FooterContact($params);
			if( $cnt->isValid()){
				if( $cnt->submit()){
					$error = false;
					$success = true;						
				}else{
					$message = 'please try again';
					$error = true;
					$success = false;							
				}
			}else{
				$error = true;
				$success = false;
				$message = 'please fill up the empty fields';
			}
			return array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $message
			);
		}
		
		public function volunteer( $params ){
		
			$message = '';
			$vol = new Volunteer($params);
			if( $vol->isValid()){
				if( $vol->submit()){
					$error = false;
					$success = true;						
				}else{
					$message = 'please try again';
					$error = true;
					$success = false;							
				}
			}else{
				$error = true;
				$success = false;
				$message = 'please fill up the empty fields and enter a valid email address';
			}
			return array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $message
			);
						
		}
		
		
		public function testimonial( $params ){
			
			$error = null;
			$success = null;
			$errorMsg = null;
			try{
				new CommentsCore($params);
				$error = false;
				$success = true;
			}catch(JSONRPCException $e){
				$errorMsg = $e->getMessage();
				$error = true;
				$success = false;
			}
			return  array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $errorMsg
			);
		}
		
		
		public function subscribe( $params ){
				
			$error = null;
			$success = null;
			$errorMsg = null;
			try{
				new SubscriberCore($params);
				$error = false;
				$success = true;
			}catch(JSONRPCException $e){
				$errorMsg = $e->getMessage();
				$error = true;
				$success = false;
			}
			return  array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $errorMsg
			);
		}
		
	}


?>