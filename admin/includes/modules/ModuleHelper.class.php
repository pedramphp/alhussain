<?php 

class ModuleHelper{
	
	public function __construct(){}

	public static function stripNonNumeric($str='') {
		
		return preg_replace('(\D+)', '', $str);
		
	}
	
	
	public static function getMonthFriendlyDate($startDate,$endDate){
		
		if(	$startDate != $endDate && 
			date('F',strtotime($startDate)) == date('F',strtotime($endDate))){
			
				return date('F j-',strtotime($startDate)) . date('jS Y',strtotime($endDate)); 
		
		}else{ return self::getFriendlyDate($startDate); }
				
	}
	
	
	public static function getFriendlyDate($date){
		
		return date('F jS, Y',strtotime($date));
		
	}
	
	
	public static function getCurrentSqlDate(){
		
		return date("Y-m-d H:i:s", time());
		
	}
	
	
	public static function getSqlDate($date){
		
		return date("Y-m-d H:i:s", strtotime($date));
		
	}
	
	
	public static function getSqlDateNoTime($date){
		
		return date("Y-m-d", strtotime($date));
	
	}
	
	
	public static function getFormatedDate($date){
		
		return date("m/d/Y", strtotime($date));
	
	}
	
	public static function isNumeric( $var ){
		
		return is_numeric($var) && is_int((int)$var);
		
	}
	
	public static function formatPhone($phone){
	    	
	       if (empty($phone)) return "";
	        if (strlen($phone) == 7)
	                sscanf($phone, "%3s%4s", $prefix, $exchange);
	        else if (strlen($phone) == 10)
	                sscanf($phone, "%3s%3s%4s", $area, $prefix, $exchange);
	        else if (strlen($phone) > 10)
	                sscanf($phone, "%3s%3s%4s%s", $area, $prefix, $exchange, $extension);
	        else
	                return "unknown phone format: $phone";
	        $out = "";
	        $out .= isset($area) ? '(' . $area . ') ' : "";
	        $out .= $prefix . '-' . $exchange;
	        $out .= isset($extension) ? ' x' . $extension : "";
	        return $out;
	}
	
};

?>