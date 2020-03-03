<?php
if(!User::getInstance()->isLoggedIn()) {
    header('Location: '.APP_URL.'?c=pages&a=login');
    die();
}
?>

<div>
    <div class="select" placeholder="Server auswählen">
        <div class="select_wrapper">
            <div class="select_option">Option 1</div>
            <div class="select_option">Option 2</div>
            <div class="select_option">Option 3</div>
            <div class="select_option">Option 3</div>
        </div>
    </div>
    
</div>