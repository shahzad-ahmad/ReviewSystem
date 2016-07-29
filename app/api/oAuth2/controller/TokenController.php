<?php
namespace app\api\oAuth2\controller ;
class TokenController {

	private $server;

	public function __construct($server_obj){
		$this->server = $server_obj;
	}

	public function getToken(){
		// Handle a request for an OAuth2.0 Access Token and send the response to the client
		$this->server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();

	}

}