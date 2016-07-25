<?php

/**
*	get base url from the URL
*	return string 	
*/

function getCurrentUri()
{
	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
	$base_url = '/' . trim($uri, '/');
	return $base_url;
}