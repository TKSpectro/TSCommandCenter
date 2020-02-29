<?
if(!User::getInstance()->isLoggedIn()){
    echo '<button id="btn_login">Mit Discord anmelden</button>';
} else {
    echo 'Logged in!';
}
?>

<script>
    $('#btn_login').on('click', function(){
        var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=750,right=0,top=0'
        var loginWin = window.open('<?php echo APP_URL; ?>?c=oauth&a=oauthLogin', 'Login through Discord', params, true);

        window.addEventListener('message', function(e) {
            // Update Login page
        });

    });
</script>