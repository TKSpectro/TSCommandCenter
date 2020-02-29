<?php
if(!User::getInstance()->isLoggedIn()) {
    header('Location: '.APP_URL.'?c=pages&a=login');
    die();
}

var_dump(Whitelist::isWhitelisted("230697828073209857"));
?>

<div>
    Index
</div>
