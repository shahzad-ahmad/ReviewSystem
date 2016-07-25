<?php
namespace app\models;
use \PDO;
class User{
	var $username;	
	var $password;

	public function __construct($u_name, $pwd){
		$this->username = $u_name;
		$this->password = $pwd;
	}

	public function checkValidation(){
		global $db;
		//$password = md5($password);
		
		$db->query("SELECT user_type, user_id FROM user_accounts WHERE username = :username AND password = :password");
		$db->bind(':username', $this->username ,PDO::PARAM_STR);
		$db->bind(':password', $this->password, PDO::PARAM_STR);
		
		$result = $db->resultset();
		$count = $db->rowCount() ;
		if($count > 0 ){
			return array("tag" => 1, "user_type" => $result[0]['user_type'] ,"user_id" => $result[0]['user_id']);
		}else return array("tag" => 0);
	}

}