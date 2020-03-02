<?php
function strposa($haystack, $needles = array())
{
    $chr = array();
    foreach ($needles as $needle)
    {
        $res = strpos($haystack, $needle);
        if ($res !== false)
            $chr[$needle] = $res;
    }
    if (empty($chr))
        return false;
    return min($chr);
}

function getMinecraftServerObjectsInArray()
{
    include 'init/10_serverconfigs.php';
    include 'models/minecraftServer.class.php';

    $minecraftServers = array();

    if (isset($minecraftConfig))
    {
        $dir = scandir($minecraftConfig['serverDir']);
        foreach ($dir as $folder)
        {
            if($folder != "." && $folder != ".."){
                $nameArray = explode("_", $folder);
                $singleServer = new minecraftServer();
                $singleServer->setId($nameArray[0]);
                $singleServer->setVersion($nameArray[1]);
                $singleServer->setName($nameArray[2]);
                $singleServer->setDirPath($minecraftConfig['serverDir'] . $folder . '\\');

                $minecraftServers[$nameArray[0]] = $singleServer;
            }
        }
    }
    return $minecraftServers;
}