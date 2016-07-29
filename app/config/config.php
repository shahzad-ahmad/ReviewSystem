<?php

/* MySQL settings */
define( 'DB_NAME',     'reviewSystem' );
define( 'DB_USER',     'root' );
define( 'DB_PASSWORD', 'coeus123' );
define( 'DB_HOST',     'localhost' );

define('dir_root_path','/reviewSystem/'); //if empty then place only single slash '/'

define('TEMPLATE_NAME','classic');

define('USER_TYPE_USER',1);
define('USER_TYPE_ADMIN',0);

define('CURRENT_LANGUAGE','english');

define('EMAIL_SENDING_ADDRESS','shahzad.malik@coeus-solutions.de');

define('ACCESS_TOKEN_LIFETIME' , 7200 );

define('ORDER_STATUS_ACTIVE',1);
define('ORDER_STATUS_DELETED',0);