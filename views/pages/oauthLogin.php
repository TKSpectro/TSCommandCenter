<?
$redirectURL = APP_URL.'?c=oauth&a=oauthResult';
var_dump($redirectURL);

$params = array(
    'client_id' => Config::get('discord_client_id'),
    'redirect_uri' => $redirectURL,
    'response_type' => 'code',
    'scope' => 'identify'
  );

  $url = 'https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params);
  // Redirect the user to Discord's authorization page
  header('Location: ' . $url);
?>
