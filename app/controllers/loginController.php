<?php
	
	class LoginController{

		public function LoginController(){

		}
		public function loadLoginPage(){
			/*require_once('app/views/pages/login.php');*/

			require_once('templates/RenderTemplate.php');
			RenderTemplate::$templateName = TEMPLATE_NAME;
			RenderTemplate::$viewName = 'login.php';
			
			RenderTemplate::loadPage();
		}
			
	}