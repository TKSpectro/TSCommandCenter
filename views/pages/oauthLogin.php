<script>
    $(window).on('load', function() {
        window.location.href='https://discordapp.com/api/oauth2/authorize?client_id=683047728129114141&redirect_uri=http%3A%2F%2Flocalhost%2Ftsserver_webinterface%2FTSCommandCenter%2F%3Fc%3Doauth%26a%3DoauthResult&response_type=code&scope=email%20identify';
    });

    $(window).on('message', function(msg){
        alert(msg.data);
    });
</script>