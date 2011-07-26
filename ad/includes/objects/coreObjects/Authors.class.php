<?php 

class Authors{
	
	private static $AUTHORS_SQL = "
		SELECT  A.`id` AS authorId,
				A.`fullname`
				
		FROM `authors` AS A
		ORDER BY A.`fullname` ASC
	";
	
	public function __construct(){
		
	}
	
	public static function getAuthors(){
		$authors = array();
		$result = DatabaseStatic::Query(self::$AUTHORS_SQL);
		while($row=DatabaseStatic::FetchAssoc($result)){
			$authors[] = $row;
		}
		return $authors;
	}
	
	
	
}


?>