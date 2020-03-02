<?
date_default_timezone_set('Europe/Berlin');        //servers timezone

/* CSGO CONFIG */
//TODO
/*
$csgoConfig['server_name'] = "My server name";                      //Name of your server
$csgoConfig['admin'] = "Admins name";                               //Your name / IGN (just changes color in console for the admin name)
$csgoConfig['server_dir'] = "server\\";                             //Directory of your Minecraft server files.
$csgoConfig['server_log'] = "logs\\latest.log";                     //location of current server log inside server dir
$csgoConfig['username'] = "username";                               //Admin username (note: case sensitive)
$csgoConfig['password'] = "password";                               //Admin password (note: case sensitive)
$csgoConfig['pmax'] = 200;
*/
/* MINECRAFT CONFIG */

$minecraftConfig['serverDir'] = '..\\minecraftServer\\';                         //Directory of your Minecraft server files.
$minecraftConfig['serverLog'] = 'logs\\latest.log';                 //location of current server log inside server dir //Admin password (note: case sensitive)
//error array for checks
$omitarray = array	(
    'Reached end of stream for',
    ': UUID of player ',
    '] logged in with entity id ',
    ' lost connection: TextComponent',
    ' lost connection: TranslatableComponent',
    ': Unknown command. Try /help for a list of commands',
    'java.io.FileNotFoundException: ',
    '	at ',
    ' [Server thread/WARN]:',
    'An unknown error occurred while attempting to perform this command'
);

/* DISCORD CONFIG */