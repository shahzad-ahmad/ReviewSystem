<?php

$appRoutes->addUrl('/login', 'Login' , 'loadLoginPage');
$appRoutes->addUrl('/login_request', 'Login' , 'validateCredentials');