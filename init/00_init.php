<?php

require_once 'core/controller.php';
require_once 'controller/oauthController.php';
require_once 'controller/servercsgoController.php';
//include controllers


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

// Autoload classes in core/classes/
spl_autoload_register(function ($class)
{
    require_once('models/' . $class . '.class.php');
});

// load config.ini
$config = parse_ini_file('config.ini');
$_GLOBALS["config"] = $config;

$user = User::getInstance();

/*
$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';

// Start the login process by sending the user to Discord's authorization page
if (get('action') == 'login')
{

    $params = array('client_id' => $config["discord_client_id"], 'redirect_uri' => $config["redirect_url"], 'response_type' => 'code', 'scope' => 'identify guilds');

    // Redirect the user to Discord's authorization page
    header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
    die();
}

// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if (get('code'))
{
    $user->login(get('code'));
    header('Location: ' . APP_URL);
}

if (session('access_token'))
{
    $user = apiRequest($apiURLBase);


}
else
{

}

if (get('action') == 'logout')
{
    $user->logout();
    header('Location: ' . APP_URL);
    die();
}

function get($key, $default = NULL)
{
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default = NULL)
{
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
*/
?>