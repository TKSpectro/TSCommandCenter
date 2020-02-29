<div id="sidebar" class="layout_col <? echo (User::getInstance()->isLoggedIn() ? '' : 'login'); ?>">
    <!-- Show Login form if not logged in -->
    <?php
        if(!User::getInstance()->isLoggedIn()) {
            echo '<div class="sidebar_title">
                        <span>Webinterface</span>
                        <h1>TS Server</h1>
                    </div>';
            echo '<img src="'.APP_URL.'assets/images/favicon-96x96clear.png" style="display: block; border-radius: 50%; margin-bottom: 5em;" height="256px" />';
            echo $body;
        } else {
            // Add HTML below
    ?>

<a href="index.php?c=pages&a=logout">Abmelden</a>

<?php 
}
?>
</div>