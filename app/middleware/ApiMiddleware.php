<?php 
namespace app\middleware;
use app\database\PdoAuth;
class ApiMiddleware{
	private $server;
	
	public function __construct(){
		$dsn      = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;
		$username = DB_USER;
		$password = DB_PASSWORD;

		// error reporting (this is a demo, after all!)
		ini_set('display_errors',1);error_reporting(E_ALL);

		// Autoloading (composer is preferred, but for this example let's just do this)
		require_once('vendor/bshaffer/oauth2-server-php/src/OAuth2/Autoloader.php');
		\OAuth2\Autoloader::register();

		$config = array(
			'client_table' => 'clients',
			'user_table' => 'User',
			'access_token_table' => 'access_tokens'
		);

		// $dsn is the Data Source Name for your database, for exmaple "mysql:dbname=my_oauth2_db;host=localhost"
		$storage = new PdoAuth(array('dsn' => $dsn, 'username' => $username, 'password' => $password), $config);

		$config = array(
			'access_lifetime' => ACCESS_TOKEN_LIFETIME
			);
		// Pass a storage object or array of storage objects to the OAuth2 server class
		$this->server = new \OAuth2\Server($storage,$config) ;

		// Add the "Client Credentials" grant type (it is the simplest of the grant types)
		$this->server->addGrantType(new \OAuth2\GrantType\ClientCredentials($storage));

		// Add the "Authorization Code" grant type (this is where the oauth magic happens)
		$this->server->addGrantType(new \OAuth2\GrantType\AuthorizationCode($storage));
	}
	//return server object
	public function getServer(){
		return $this->server;
	}

	/*
	*   if token is valid it will return true otherwise false
	*/
	public function isAuthenticToken(){
		//Handle a request to a resource and authenticate the access token
		if (!$this->server->verifyResourceRequest(\OAuth2\Request::createFromGlobals())) {
			$this->server->getResponse()->send();
			return false;
		}
		return true;
	}


	public function isAuthentic(){
		return true;
	}
}