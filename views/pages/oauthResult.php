<?
if(Input::get('error')) {
    // Login failed or has been cancelled by user
} else {

    $code = Input::get('code');
    //Session::put(, $code);
    User::getInstance()->login($code);

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