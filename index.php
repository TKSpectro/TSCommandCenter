<?php
session_start();

require_once 'init/00_init.php';
require_once 'init/10_serverconfigs.php';

$controllerName = $_GET['c'] ?? 'pages';
$actionName = $_GET['a'] ?? 'index';

$controllerPath = __DIR__ . '/controller/' . $controllerName . 'Controller.php';

// Setup path, url and query of request
define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('APP_URL', str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . (dirname($_SERVER['PHP_SELF']) === DIRECTORY_SEPARATOR ? '' : dirname($_SERVER['PHP_SELF'])) . '/'));
define('APP_QUERY', $_SERVER['QUERY_STRING']);

if (file_exists($controllerPath)) {
    require_once $controllerPath;

    $controllerClassName = '\\app\\controller\\' . ucfirst($controllerName) . 'Controller';

    if (class_exists($controllerClassName)) {
        $controllerInstance = new $controllerClassName($actionName, $controllerName);
        $actionMethodName = 'action' . ucfirst($actionName);
        if (method_exists($controllerInstance, $actionMethodName)) {
            $controllerInstance->$actionMethodName();
            $controllerInstance->renderHTML();

        } else {
            header('Location: index.php?c=page&a=error404');
        }
    } else {
        header('Location: index.php?c=pages&a=error404');
    }
} else {
    header('Location: index.php?c=pages&a=error404');
}
