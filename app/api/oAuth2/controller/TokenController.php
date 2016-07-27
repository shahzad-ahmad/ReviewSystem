<?php
namespace app\api\oAuth2\controller ;

class TokenController {
	
	public function __construct(){

	}

	public function getToken(){
		require_once 'lib/api/oAuth2/server.php';
		// Handle a request for an OAuth2.0 Access Token and send the response to the client
		$server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();

	}

	public function validateResource(){
		require_once 'lib/api/oAuth2/server.php';

		// Handle a request to a resource and authenticate the access token
		if (!$server->verifyResourceRequest(\OAuth2\Request::createFromGlobals())) {
		    $server->getResponse()->send();
		    die;
		}
		echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
	}
}