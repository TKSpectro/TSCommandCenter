<?php
if(!User::getInstance()->isLoggedIn()) {
    header('Location: '.APP_URL.'?c=pages&a=login');
    die();
}
?>

<div>
    Index
</div>
