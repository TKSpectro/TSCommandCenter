<?
if(!User::getInstance()->isLoggedIn()) {
    header('HTTP/1.0 403 Forbidden');
    die();
}