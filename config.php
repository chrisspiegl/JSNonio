<?php

if(substr($_SERVER['HTTP_HOST'], strlen($_SERVER['HTTP_HOST'])-4, 4) != 'mint'){
	define('REQUESTURL', 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
	define('SITEFOLDER', '/');
	define('SERVERNAME', $_SERVER['SERVER_NAME']);
	define('SITEURL', 'http://'.SERVERNAME.SITEFOLDER);
	define('ASSETSPATH', SITEURL.'_/');
}else{
	define('REQUESTURL', 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
	define('SITEFOLDER', '/');
	define('SERVERNAME', $_SERVER['SERVER_NAME']);
	define('SITEURL', 'http://'.SERVERNAME.SITEFOLDER);
	define('ASSETSPATH', SITEURL.'_/');
}

date_default_timezone_set('Europe/Berlin');     // Set this to the timezone you can think in

// NO EDITING DOWN HERE!
if ( !defined('DOC_ROOT') )
	define('DOC_ROOT', dirname(__FILE__) . '/');
require_once(DOC_ROOT.'functions.php');
?>