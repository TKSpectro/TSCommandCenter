<?
if(!User::getInstance()->isLoggedIn()){
    echo '<button class="btn btn-primary" id="btn_login"><i class="fab fa-discord"></i> Mit Discord anmelden <i class="btn-spin hidden fas fa-spinner fa-spin"></i></button>';
} else {
    header('Location: '.APP_URL);
    die();
}
?>

<script>
    $('#btn_login').on('click', function(){
        var btn = $(this);
        btn.find('.btn-spin').removeClass('hidden');
        btn.prop('enabled', false);

        var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=750,right=0,top=0'
        var loginWin = window.open('<?php echo APP_URL; ?>?c=oauth&a=oauthLogin', 'Login through Discord', params, true);

        var timer = setInterval(function(){
            if(loginWin.closed){
                clearInterval(timer);
                btn.find('.btn-spin').addClass('hidden');
                console.log('Closed.');
            }
        }, 500);

        window.addEventListener('message', function(e) {
            // Update Login page
            clearInterval(timer);
            setTimeout(function(){
                window.location.reload();
            },500);
            
        });

    });
</script>