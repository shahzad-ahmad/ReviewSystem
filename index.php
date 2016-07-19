<?php
//requiring required files
require_once('app/pre_loaders.php');
require_once('app/routes.php');
require_once('app/middleware/middleware.php');

function getCurrentUri()
{
	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
	$uri = '/' . trim($uri, '/');
	return $uri;
}

$base_url = getCurrentUri();
$routes = explode('/', $base_url);

$middleware_obj  = new Middleware();
$is_route_page = $middleware_obj->isAuthentic();

//if middleware response true then route
if($is_route_page){
	$routing = new Routes($routes,$_SERVER['REQUEST_METHOD']);
	$routing->dispatch();
}
else{
	echo "Error";
}
