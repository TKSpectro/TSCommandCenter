<?php
$controllerName = $_GET['c'] ?? 'pages';

if($controllerName != 'api') {
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TS Webinterface :: <?= $title ?></title>

    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon-96x96clear.png">

    <link href="<?php echo APP_URL; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo APP_URL; ?>assets/css/sidebar.min.css" rel="stylesheet" />
    <link href="<?php echo APP_URL; ?>assets/css/header.min.css" rel="stylesheet" />
    <link href="<?php echo APP_URL; ?>assets/fonts/fontawesome-5.12.1/css/all.min.css" rel="stylesheet" />

    <?php
        if(isset($_GET['a'])) {
            if($_GET['a'] === 'error404') {
                echo '<link href="'.APP_URL.'assets/css/errors.min.css" rel="stylesheet" />';
            }
            if($_GET['a'] === 'filebrowser') {
                echo '<link href="'.APP_URL.'assets/css/filebrowser.min.css" rel="stylesheet" />';
            }
        }
    ?>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div id="wrapper" class="layout_table">
        <? include __DIR__ . '/shared/sidebar.php'; ?>

        <div id="content" class="layout_col">
            <? if(User::getInstance()->isLoggedIn()){
                include __DIR__ . '/shared/header.php'; ?>

                <div class="content-container">
                    <h3><?= $title ?></h3>
                    <?php
                        // Show page content in content section only if logged in
                        echo $body;
                    ?>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <script src="<?php echo APP_URL.'assets/js/inputs.js'; ?>"></script>
</body>
</html>

<?
}
?>