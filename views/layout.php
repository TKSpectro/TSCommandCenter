<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    
    <link href="<?php echo APP_URL; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo APP_URL; ?>assets/fonts/fontawesome-5.12.1/css/all.min.css" rel="stylesheet" />

    <?php
    if(isset($_GET['a'])) {
        if($_GET['a'] === 'error404') {
            echo '<link href="'.APP_URL.'assets/css/errors.min.css" rel="stylesheet" />';
        }
    }
    ?>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div id="wrapper" class="layout_table">
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
                }
            ?>
        </div>

        <!-- Header should be besides sidebar and on top -->
        <header>
            <? include __DIR__ . '/shared/header.php'; ?>
        </header>

        <div id="content" class="layout_col">
            <?php
                // Show page content in content section only if logged in
                if(User::getInstance()->isLoggedIn()) {
                    echo $body;
                }
            ?>
        </div>
    </div>
</body>
</html>