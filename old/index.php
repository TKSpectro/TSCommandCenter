<?php
require 'init.php';
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>TS Webinterface :: Übersicht</title>

        <script src="assets/js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <?php
            if(!User::getInstance()->isLoggedIn()){
                echo '<button id="btn_login">Mit Discord anmelden</button>';
            }
        ?>

        <script>
            $('#btn_login').on('click', function(){
                var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=750,right=0,top=0'
                var loginWin = window.open('<?php echo APP_URL; ?>?action=login', 'Login through Discord', params, true);
            
                window.addEventListener('message', function(e) {
                    alert(e.data);
                });

                loginWin.addEventListener('beforeunload', function(event) {
                    loginWin.opener.alert('Default');
                });

            });
        </script>
    </body>
</html>