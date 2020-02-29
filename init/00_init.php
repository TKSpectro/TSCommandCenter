<?php

require_once 'core/controller.php';
require_once 'controller/oauthController.php';
require_once 'controller/servercsgoController.php';
require_once 'controller/serverminecraftController.php';
//include controllers

// Setup path, url and query of request
define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('APP_URL', str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . (dirname($_SERVER['PHP_SELF']) === DIRECTORY_SEPARATOR ? '' : dirname($_SERVER['PHP_SELF'])) . '/'));
define('APP_QUERY', $_SERVER['QUERY_STRING']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

// Autoload classes in core/classes/
spl_autoload_register(function ($class) {
    require_once('models/' . $class . '.class.php');
});

// load config.ini
$config = parse_ini_file('config.ini');
$GLOBALS["config"] = $config;

$whitelist = file_get_contents(APP_PATH.'whitelist.json');
$GLOBALS["whitelist"] = json_decode($whitelist);

$user = User::getInstance();
?>