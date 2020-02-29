<?
if(Input::get('error')) {
    // Login failed or has been cancelled by user
} else {
    $redirectURL = APP_URL.'?c=oauth&a=oauthResult';

    $code = Input::get('code');
    var_dump($code);
    if($code) {
        User::getInstance()->login($code, $redirectURL);
    }
}
?>

<script>
    $(window).on('load', function(){
        var parentWindow = window.opener;
        if(parentWindow != null) {
            parentWindow.postMessage('Default message');
            window.close();
        }
    });
</script>