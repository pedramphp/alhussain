<?php 

	class Contact{
		
		public function __construct(){
		
		}
		
		public function contactUs( $params ){
			
			LiteFrame::JSONLayout();
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
			return $params;
		}
		
		public function volunteer( $params ){
			return $params;
		}
		
	}


?>