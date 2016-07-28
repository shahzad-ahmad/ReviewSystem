<?php
namespace app\api\oAuth2\controller ;
class TokenController {

	private $server;

	public function __construct($server_obj){
		$this->server = $server_obj;
	}

	public function getToken(){
		//require_once 'vendor/api/oAuth2/server.php';
		// Handle a request for an OAuth2.0 Access Token and send the response to the client
		$this->server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();

	}

	public function validateResource(){
		
		// // Handle a request to a resource and authenticate the access token
		// if (!$this->server->verifyResourceRequest(\OAuth2\Request::createFromGlobals())) {
		//     $this->server->getResponse()->send();
		//     die;
		// }
		// echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
	}
}