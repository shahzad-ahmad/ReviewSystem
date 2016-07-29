<?php
namespace app\models;
use \PDO;

class Admin {
	public function __construct(){

	}

	public static function getCustomers ($start, $limit){
		global $db;

		$db->query("SELECT id,email,date_creation FROM User WHERE type = ".USER_TYPE_USER." LIMIT :start , :limit");
		$db->bind(':start', $start ,PDO::PARAM_INT);
		$db->bind(':limit', $limit, PDO::PARAM_INT);
		
		$result = $db->resultset();
		$count = $db->rowCount() ;

		return array(	'count'=> $count ,
						'result' => $result
					);
		
	}

}