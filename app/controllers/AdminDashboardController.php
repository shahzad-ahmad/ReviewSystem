<?php
namespace app\controllers;
use templates\RenderTemplate;
use app\models\Admin;

class AdminDashboardController {
	public $list_customer_html;
	public function __construct(){

	}

	public function loadAdminDashboard(){
		if( isset($_SESSION) && isset($_SESSION['user_id']) && ($_SESSION['user_type'] == USER_TYPE_ADMIN ) ){
			RenderTemplate::$templateName = TEMPLATE_NAME;
			RenderTemplate::$viewName = 'adminDashboard.php';
			
			$list_customer = Admin::getCustomers (0, 10);
			if($list_customer['count']){
				foreach ( $list_customer['result'] as $row  ){
					$this->list_customer_html .=' 
					<tr>
				      <td>'.$row['id'].'</td>
				      <td>'.$row['email'].'</td>
				      <td>'.$row['date_creation'].'</td>
				      <td><a href="javascript:;">Edit</a> / <a href="javascript:;">Delete</a></td>
				    </tr>';
				    
				}
			}else{
				$this->list_customer_html = '<td style="text-align:center;" colspan="4"><strong>'.TEXT_NO_RECORD_FOUND.'</strong></td>';
				
			}
			RenderTemplate::loadPage($this->list_customer_html);
		}else{
			header('Location: '.dir_root_path.'login');
		}
	}

}