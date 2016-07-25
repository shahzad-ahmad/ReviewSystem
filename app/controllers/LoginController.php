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
		if(isset($_POST['cred']) && $_POST['un'] && $_POST['pdw']){
			$u_name = $_POST['un'] ;
			$pwd =  $_POST['pdw'];

			$user = new User($u_name, $pwd);
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
					$return_arr = array("tag"=>1,"url"=>"admin_dashboard");
				}
			}else{
				$return_arr = array ("tag"=> 0 );
			}
		}else{
				$return_arr = array ("tag"=> 0 );
			}
		echo json_encode($return_arr);
		die;

	}
}

