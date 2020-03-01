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

            if(!isset($_GET['a'])) {
                $currentPage = 'index';
            } else {
                $currentPage = $_GET['a'];
            }
            
            // Add HTML below
    ?>

    <div class="nav_userprofile">
        <img id="user_profile_picture" src="<?php echo User::getInstance()->getAvatarURL(); ?>" height="45px" width="45px" />
        <div id="user_profile_description">
            <span>Eingeloggt als</span>
            <h5 class="light"><?php echo User::getInstance()->data()->username.'#'.User::getInstance()->data()->discriminator; ?></h5>
        </div>
    </div>

    <div class="nav_headline">
        <h6>TS Server :: Webinterface</h6>
    </div>

    <div class="nav_wrapper">
        <ul class="nav_category">
            <li class="nav_label">Allgemein</li>
            <li class="<?php echo ($currentPage == 'index' ? 'active' : ''); ?>"><a href="index.php?c=pages&a=index"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            <li class="not_available"><a href="index.php?c=pages&a=na"><i class="fas fa-folder-open"></i>Dateibrowser</a></li>
            <li class="not_available"><a href="index.php?c=pages&a=na"><i class="fas fa-photo-video"></i>Videos & Clips</a></li>
        </ul>
        <ul class="nav_category">
            <li class="nav_label">CS:GO Server</li>
            <li class="not_available"><a href="index.php?c=pages&a=na"><i class="fas fa-terminal"></i>Konsole</a></li>
        </ul>
        <ul class="nav_category">
            <li class="nav_label">Minecraft Server</li>
            
            <li class="<?php echo ($currentPage == 'serverminecraft' ? 'active' : ''); ?>"><a href="index.php?c=serverminecraft&a=serverminecraft"><i class="fas fa-terminal"></i>Konsole</a></li>
            <li class="not_available"><a href="index.php?c=pages&a=na"><i class="fas fa-cogs"></i>Einstellungen</a></li>
        </ul>
    </div>
<?php 
}
?>
</div>