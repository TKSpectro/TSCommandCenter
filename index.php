<?php
session_start();

require_once 'init/10_imports.php';

$controllerName = $_GET['c'] ?? 'pages';
$actionName = $_GET['a'] ?? 'index';

$controllerPath = __DIR__ . '/controller/' . $controllerName . 'Controller.php';

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
