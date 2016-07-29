<?php
namespace app\api\oAuth2\controller ;
use app\models\repository\ApiRepository;
class ReviewController {
	
	private $server;
	private $apiModel;

	public function __construct($server_obj){
		$this->server = $server_obj;
		$this->apiModel = new ApiRepository();
	}
	public function handleReviewRequest(){
		$request_method = $_SERVER['REQUEST_METHOD'];
		$token = getallheaders()['Authorization'];
		$token = explode(' ',$token)[1];

		switch($request_method){
			case 'GET':
				if(isset($_GET['order_id']))
					$order_id = $_GET['order_id'];
				else $order_id = null;
				$status = $this->apiModel->getReview($token ,$order_id);
				print_r($status);
				break;

 			default:
 				print_r(json_encode(array('Error'=>'Invalid Request')));
				die;
		}
	}
}

