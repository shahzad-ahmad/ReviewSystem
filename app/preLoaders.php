<?php
require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/helpers/helpers.php');
require(__DIR__ . '/autoload.php');

use app\Routes; 
$appRoutes = new Routes();
require_once(__DIR__.'/config/routes.php');

use app\database\Database;
$db = new Database();

use app\middleware\Middleware;
$middleware_obj  = new Middleware();


