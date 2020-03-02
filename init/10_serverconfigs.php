<?
date_default_timezone_set('Europe/Berlin');        //servers timezone

/* CSGO CONFIG */

$csgoConfig['serverConfigDir'] = "..\\csserver\\steamcmd\\steamapps\\common\\Counter-Strike Global Offensive Beta - Dedicated Server\\csgo";   //directory for the csgo server

/* MINECRAFT CONFIG */

$minecraftConfig['serverDir'] = '..\\minecraftServer\\';            //directory for all minecraft servers
$minecraftConfig['serverLog'] = 'logs\\latest.log';                 //location of current server log
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