<?php

//requiring required files
require_once('app/preLoaders.php');

$base_url = getCurrentUri();



$file = fopen('php://input', 'r');
$tempName = tempnam('/var/tmp', 'img_');
$temp = fopen($tempName, 'w');
$imageSize = stream_copy_to_stream($file, $temp);
fclose($temp);
$imageDimensions = getimagesize($tempName);
define('tmp_file', $tempName);



$server_obj= null;
if(array_key_exists($base_url, $appRoutes->getUrlApiArray()) ){
	$middleware_obj =  new app\middleware\ApiMiddleware();


	if(in_array($base_url,$client_url))
		$is_valid_page = $middleware_obj->isAuthenticToken();
	else 		
	$is_valid_page = $middleware_obj->isAuthentic();
	$server_obj = $middleware_obj->getServer();
}else {
	$middleware_obj  = app\middleware\Middleware();
	$is_valid_page = $middleware_obj->isAuthentic();
}

//if middleware response true then route
if($is_valid_page){
	$appRoutes->dispatch($base_url , $server_obj);
}
else{
	echo "Error Authentication";
}
