<?php
	require_once 'core/App.php';
	require_once 'core/Controller.php';
	require_once 'core/Model.php';
	require_once 'core/Router.php';


// Root path for inclusion.
define('INC_ROOT', dirname(__DIR__));
// Require composer autoloader
require_once INC_ROOT . '/users/vendor/autoload.php';
// Require core files
/*require_once INC_ROOT . '/app/core/App.php';
require_once INC_ROOT . '/app/core/Controller.php';*/
// Require database component
//require_once INC_ROOT . '/app/database.php';
//Root URL 
define('HTTP_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);
// Root path for assets
define('ASSET_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);
?>