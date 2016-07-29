<?php
namespace app\controllers;
use templates\RenderTemplate;
use app\models\User;
class DashboardController {

	public function loadDashboard(){
		RenderTemplate::$templateName = TEMPLATE_NAME;
		RenderTemplate::$viewName = 'dashboard.php';
		
		$user_id = $_SESSION['user_id'];
		$credential = User::getApiIdSecret($user_id);
		RenderTemplate::loadPage($credential);
	}
}