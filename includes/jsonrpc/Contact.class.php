<?php 

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
			return $params;
		}
		
	}


?>