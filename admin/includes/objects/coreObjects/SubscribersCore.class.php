<?php 

class SubscribersCore{
	
	public function __construct(){}
	
	private static $LIMITED_SUBSCRIBERS_SQL = "
		SELECT	S.`id` AS subscriberId,
				INET_NTOA(S.`ip_address`) AS ipAddress,
				S.`email` AS emailAddress,
				S.`entry_date` AS entryDate
		FROM subscribers AS S
		ORDER BY S.`entry_date` DESC
		LIMIT %d
	";
	
	private static $ALL_SUBSCRIBERS_SQL = "
		SELECT	S.`id` AS subscriberId,
				INET_NTOA(S.`ip_address`) AS ipAddress,
				S.`email` AS emailAddress,
				S.`entry_date` AS entryDate
		FROM subscribers AS S
		ORDER BY S.`entry_date` DESC
	";
	
	public static function getSubscribers( $limit = 0 ){
		if($limit === 0){
			$result = DatabaseStatic::Query(self::$ALL_SUBSCRIBERS_SQL);
		}else{
			$result = DatabaseStatic::Query(sprintf(self::$LIMITED_SUBSCRIBERS_SQL,$limit));
		}
		
		$records = array();
		while($row=DatabaseStatic::FetchAssoc($result)){
			$row['entryTime'] = date('H:i',strtotime($row['entryDate']));
			$row['entryDate'] = date('F jS, Y',strtotime($row['entryDate']));
			$records[] = $row;
		}
		return $records;

	}
	
}


?>