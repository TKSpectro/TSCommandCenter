<?php
// Initialize Session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

// Setup path, url and query of request
define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('APP_URL', str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . (dirname($_SERVER['PHP_SELF']) === DIRECTORY_SEPARATOR ? '' : dirname($_SERVER['PHP_SELF'])) . '/'));
define('APP_QUERY', $_SERVER['QUERY_STRING']);

// Autoload classes in core/classes/
spl_autoload_register(function ($class) {
    require_once ('core/classes/'.$class.'.php');
});

// Load config.ini

$config = parse_ini_file('config.ini');
$_GLOBALS["config"] = $config;

$user = User::getInstance();











$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';

// Start the login process by sending the user to Discord's authorization page
if(get('action') == 'login') {

  $params = array(
    'client_id' => $config["discord_client_id"],
    'redirect_uri' => $config["redirect_url"],
    'response_type' => 'code',
    'scope' => 'identify guilds'
  );

  // Redirect the user to Discord's authorization page
  header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
}

// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if(get('code')) {
    $user->login(get('code'));
    header('Location: ' . APP_URL);
}

if(session('access_token')) {
  $user = apiRequest($apiURLBase);

  /*echo '<h3>Logged In</h3>';
  echo '<h4>Welcome, ' . $user->username . '</h4>';
  echo '<pre>';
    print_r($user);
  echo '</pre>';*/

} else {
  /*echo '<h3>Not logged in</h3>';
  echo '<p><a href="?action=login">Log In</a></p>';*/
}


if(get('action') == 'logout') {
  $user->logout();
  header('Location: '.APP_URL);
  die();
}

function apiRequest($url, $post=FALSE, $headers=array()) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  $response = curl_exec($ch);

  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

  $headers[] = 'Accept: application/json';

  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);
  return json_decode($response);
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

?>