<?php
use \PHPMailer;

/**
*	get base url from the URL
*	return string 	
*/
function getCurrentUri()
{
	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
	$base_url = '/' . trim($uri, '/');
	return $base_url;
}


/**
* Sending Email
*/

function sendEmail($to , $from , $subject, $body){
	require_once('lib/PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	
	$mail->SMTPDebug = 2; 
	//$mail->AddReplyTo('shahzad.malik@coeus-solutions.de', 'Clark Kent');
	$mail->SetFrom($from, 'Review System');
	$mail->AddAddress($to, $to);
	$mail->Subject = $subject;
	$mail->MsgHTML( $body );
	 
	return  $mail->Send() ;
}

/*
Random password 
*/
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }

	if(isPasswordAlreadExist() )
		$ret_val = randomPassword();
    else $ret_val = implode($pass); //turn the array into a string
    return $ret_val;
}

/**
check if password alread Exist in database
*/
function isPasswordAlreadExist($password){
	global $db;
	$db->query("SELECT id FROM User WHERE password = :pwd ");
	$db->bind(':pwd', $password ,PDO::PARAM_STR);
	$result = $db->resultset();
	$count = $db->rowCount() ;
	if($count == 0 )
		return 0;
	else return 1;
}

/**
check redirection based on if session exist or not
*/

function isRedirectionApplied(){
	global $ajax_request_url;
	global $without_session_pages;

	$base_url =  getCurrentUri();
	if($base_url == URL_ROOT){
		header('Location: '.dir_root_path.'login');
	}
	else if(! in_array($base_url, $ajax_request_url) ){
		if(! (isset($_SESSION) && isset($_SESSION['user_id'])  )  
			&&  ( !in_array($base_url, $without_session_pages) ) 
			) 
			header('Location: '.dir_root_path.'login');
		else if(  ( in_array($base_url, $without_session_pages) )
				&&  (isset($_SESSION) && isset($_SESSION['user_id']) )
				){
			if($_SESSION['user_type'] == USER_TYPE_ADMIN)
				header('Location: '.dir_root_path.ltrim(URL_ADMIN_DASHBOARD,"/") );
			else
				header('Location: '.dir_root_path.ltrim(URL_USER_DASHBOARD,"/") );
		}
	}

}