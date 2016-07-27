<?php
namespace app\models;
use \PDO;
class User{
	var $email;	
	var $password;

	public function __construct($u_name, $pwd){
		$this->email = $u_name;
		$this->password = $pwd;
	}

	public function checkValidation(){
		global $db;
		//$password = md5($password);
		
		$db->query("SELECT type, id FROM User WHERE email = :email AND password = :password");
		$db->bind(':email', $this->email ,PDO::PARAM_STR);
		$db->bind(':password', $this->password, PDO::PARAM_STR);
		
		$result = $db->resultset();
		$count = $db->rowCount() ;
		if($count > 0 ){
			return array("tag" => 1, "user_type" => $result[0]['type'] ,"user_id" => $result[0]['id']);
		}else return array("tag" => 0);
	}

	public static function isEmailExist($email){
		global $db;
		$db->query("SELECT id FROM User WHERE email = :email ");
		$db->bind(':email', $email ,PDO::PARAM_STR);
		$result = $db->resultset();
		$count = $db->rowCount() ;
		if($count == 0 )
			return array("tag" => 0 , "message" => TEXT_EMAIL_NOT_EXIST);
		else
			return array("tag" => 1);
		
	}

	public static function updatePassword($email,$password){
		global $db;
		$db->query("UPDATE User set password = :password WHERE email = :email ");
		$db->bind(':email', $email ,PDO::PARAM_STR);
		$db->bind(':password', $password ,PDO::PARAM_STR);
		$result = $db->execute();
		
	}

}