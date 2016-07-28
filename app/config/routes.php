<?php
/**
* URL , Controller , Function name
*/

define('URL_ROOT','/');

define('URL_LOGIN_AJAX','/login-request');
define('URL_FORGOT_PASSWORD_AJAX','/forgot-password-request');
$ajax_request_url = array(URL_LOGIN_AJAX , URL_FORGOT_PASSWORD_AJAX);



define('URL_LOGIN_PAGE','/login');
$appRoutes->addUrl(URL_LOGIN_PAGE, 'Login' , 'loadLoginPage');
$appRoutes->addUrl(URL_LOGIN_AJAX, 'Login' , 'validateCredentials');

define('URL_FORGOT_PASSWORD_PAGE','/forgot-password');
$appRoutes->addUrl('/forgot-password', 'Login' , 'forgotPassword');
$appRoutes->addUrl(URL_FORGOT_PASSWORD_AJAX, 'Login' , 'sendForgotPassword');

define('URL_ADMIN_DASHBOARD','/admin-dashboard');
$appRoutes->addUrl(URL_ADMIN_DASHBOARD, 'AdminDashboard' , 'loadAdminDashboard');

define('URL_USER_DASHBOARD','/dashboard');
$appRoutes->addUrl(URL_USER_DASHBOARD, 'Dashboard' , 'loadDashboard');

$without_session_pages = array(URL_LOGIN_PAGE,URL_FORGOT_PASSWORD_PAGE);


/**
* API URLS
*/
define('URL_AUTH_API','/api/oAuth2/token');
$appRoutes->addAPIUrl(URL_AUTH_API, 'Token' , 'getToken');

define('URL_API_ORDER', '/api/order');
$appRoutes->addAPIUrl(URL_API_ORDER, 'Order' , 'handleOrderRequest');


$client_url = array(URL_API_ORDER);
$api_url = array(URL_AUTH_API, URL_API_ORDER);

