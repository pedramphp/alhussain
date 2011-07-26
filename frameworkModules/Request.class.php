<?php 

	class Request {
		
		public static function isNumeric( $var ){
			return is_numeric($var) && is_int((int)$var);
		}
		
	}

?>