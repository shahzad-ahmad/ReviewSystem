<?php
namespace app\controllers;	
use templates\RenderTemplate;
use app\models\User;

class LoginController{

	public function __construct(){
		
	}
	public function loadLoginPage(){
		RenderTemplate::$templateName = TEMPLATE_NAME;
		RenderTemplate::$viewName = 'login.php';
		
		RenderTemplate::loadPage();
	}
	public function validateCredentials(){
		if(isset($_POST['cred']) && $_POST['email'] && $_POST['pdw']){
			$email = $_POST['email'] ;
			$pwd =  $_POST['pdw'];

			$user = new User($email, $pwd);
			$valid_arr = $user->checkValidation();
			if( $valid_arr['tag'] ){

				// if valid client user then redirect to dashboard
				if($valid_arr['user_type'] == USER_TYPE_USER){	
					$return_arr = array("tag"=>1,"url"=>"dashboard");
					$_SESSION['user_id'] = $valid_arr['user_id'];
					$_SESSION['user_type'] = $valid_arr['user_type'];
				}
				// if valid admin user then redirect to dashboard
				else {
					$return_arr = array("tag"=>1,"url"=>"admin-dashboard");
					$_SESSION['user_id'] = $valid_arr['user_id'];
					$_SESSION['user_type'] = $valid_arr['user_type'];
				}
			}else{
				$return_arr = array ("tag"=> 0 ,"message" => TEXT_INVALID_EMAIL_OR_PASSWORD);
			}
		}else{
				$return_arr = array ("tag"=> 0 ,"message" => TEXT_INVALID_EMAIL_OR_PASSWORD);
			}
		echo json_encode($return_arr);
		die;
	}

	public function forgotPassword(){

		RenderTemplate::$templateName = TEMPLATE_NAME;
		RenderTemplate::$viewName = 'forgotPassword.php';
		
		RenderTemplate::loadPage();
	}
	public function sendForgotPassword(){
		if(!$_POST['email'])
			echo json_encode(array("tag" => 0 , "message" => TEXT_EMAIL_NOT_EXIST));
		else{
			$email = $_POST['email'];
			$is_email_exist_respone = User::isEmailExist($email);
			if($is_email_exist_respone['tag']){

				$to =  $email;
				$from = EMAIL_SENDING_ADDRESS;
				$subject = TEXT_EMAIL_FORGOT_PASSWORD_SUBJECT;
				$new_password = randomPassword();
				$body = 'Your new Password is '. $new_password;
				User::updatePassword($email, $new_password);
				$is_email_sent = sendEmail($to , $from , $subject, $body);
				if($is_email_sent)
					echo json_encode(array("tag" => 1 , "message" => TEXT_EMAIL_SENT) );
				else	
					echo json_encode ( array("tag" => 0 , "message" => ERROR_SENDING_EMAIL) );
			}else{
				echo json_encode(is_email_exist_respone);	
			}
		}
		die;
	}
	public function logout(){
		session_destroy();
		header('Location: login');
	}
}

