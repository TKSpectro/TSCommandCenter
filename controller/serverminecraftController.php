<?

namespace app\controller;

class serverminecraftController extends \app\core\Controller
{
    public function actionServerminecraft()
    {
        include 'init/10_serverconfigs.php';
        $this->_params['title'] = 'Minecraft Konsole';

        //check if there is serverID given in GET
        if (isset($_GET['serverID']))
        {
            //$minecraftConfig hast to be included through init/10_serverconfigs.php
            if (isset($minecraftConfig))
            {
                //go through the main server directory and look for the matching ID and set it as $dir
                $dir = scandir($minecraftConfig['serverDir']);
                $changedDir = false;
                foreach ($dir as $folder)
                {
                    $nameArray = explode("_", $folder);
                    if ($nameArray[0] == $_GET['serverID'])
                    {
                        $dir = $minecraftConfig['serverDir'] . $folder . '\\';
                        $changedDir = true;
                    }
                }

                //dir has to be changed else it would be still in the main server directory
                if ($changedDir)
                {
                    //put the command into command.txt so it will be put in the console via AHK
                    if (isset($_POST['minecraftCommand']))
                    {
                        //store the command in a variable
                        $command = $_POST['minecraftCommand'];
                        //open command.txt at the last line
                        $file_handle = fopen($dir . "command.txt", "a");
                        //write the following line (PHP_EOL is a newline marker)
                        fwrite($file_handle, "$command" . PHP_EOL);
                        //the following line trims the command.txt to make sure no empty lines get in in wrong places, so the script does not 'get stuck' on an empty line.
                        file_put_contents($dir . "command.txt", preg_replace('~[\r\n]+~', "\r\n", trim(file_get_contents($dir . "command.txt"))) . PHP_EOL);
                        //close the file
                        fclose($file_handle);
                    }

                    //writing log into php variable
                    $mcLogFile = file($dir . $minecraftConfig['serverLog']);
                    for ($i = count($mcLogFile) - 1; $i > -1; $i--)
                    {
                        $newstring = $mcLogFile[$i];
                        // Fix html tags
                        $newstring = preg_replace("/</", "&lt;", $newstring);
                        $newstring = preg_replace("/>/", "&gt;", $newstring);
                        $newstring = "<font color='pink'>" . $newstring;
                        $newstring = preg_replace("/\\[Server thread\\/INFO\\]: &lt;/", "</font><font color='lightblue'>[Online] </font>&lt;", $newstring);
                        //Cleans up server tag a bit
                        $newstring = preg_replace("/\\[Server /", "</font>", $newstring);
                        $newstring = preg_replace("/thread\\/INFO\\]: /", "", $newstring);
                        $newstring = preg_replace("/thread\\/ERROR\\]: /", "<font color='red'>[E]</font>", $newstring);
                        $newstring = preg_replace("/\\[Server\\]/", "", $newstring);
                        $newstring = preg_replace("/\\[Web\\]/", "<font color='lightblue'>[Web]</font>", $newstring);

                        if (!isset($_POST['mcLog']))
                        {
                            $_POST['mcLog'] = '';
                        }
                        $_POST['mcLog'] .= $newstring . "<br>";
                    }
                }
                else
                {
                    header('Location: ' . APP_URL . '?c=pages&a=error404');
                    die();
                }
            }
        }
        else
        {
            header('Location: ' . APP_URL . '?c=pages&a=error404');
            die();
        }
    }
}
?>