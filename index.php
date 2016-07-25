<?php
//requiring required files
require_once('app/preLoaders.php');

$base_url = getCurrentUri();

//Validating middlewares

$is_valid_page = $middleware_obj->isAuthentic();

//if middleware response true then route
if($is_valid_page){
	$appRoutes->dispatch($base_url);
}
else{
	echo "Error Authentication";
}
