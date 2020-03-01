<?

namespace app\controller;

class serverminecraftController extends \app\core\Controller
{
    public function actionServerminecraft()
    {
        include 'init/10_serverconfigs.php';
        $this->_params['title'] = 'Minecraft-Server';

        if (isset($minecraftConfig))
        {
            if (isset($_POST['minecraftCommand']))
            {
                //store the command in a variable
                $command = $_POST['minecraftCommand'];
                //open command.txt at the last line
                $file_handle = fopen($minecraftConfig['serverDir'] . "command.txt", "a");
                //write the following line (PHP_EOL is a newline marker)
                fwrite($file_handle, "$command" . PHP_EOL);
                //the following line trims the command.txt to make sure no empty lines get in in wrong places, so the script does not 'get stuck' on an empty line.
                file_put_contents($minecraftConfig['serverDir'] . "command.txt", preg_replace('~[\r\n]+~', "\r\n", trim(file_get_contents($minecraftConfig['serverDir'] . "command.txt"))) . PHP_EOL);
                //close the file
                fclose($file_handle);
            }
            //old console implementation -> deprecated cause it was used in an iframe -> change to ajax?!
            /*
            if (isset($_POST['minecraftRefresh']))
            {
                //var p is used to limit the number of lines it is going to process from the log file into the webpage, goto line 95 for more info.
                $p = 0;
                //reads current server log file
                $file = file($minecraftConfig['serverDir'] . $minecraftConfig['serverLog']);
                for ($i = count($file) - 1; $i > -1; $i--)
                {
                    $newstring = $file[$i];
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

                    if(isset($omitarray)){
                        if (strposa($newstring, $omitarray) === false)
                        {
                            //Prints the current line, if it isn't omitted
                            echo $newstring . '<br>';
                            //Adds to the p variable, which is all about size.
                            $p++;
                            //how many lines it puts on the page before exiting the loop (could remove this, but if the log is super super big it could have issues and long load times. If you have utilized the omitarray properly and filtered out all unwanted stuff, 200 lines should be more than enough.
//                        if ($p == $pmax)
//                        {
//                            break;
//                        }
                        }
                    }
                }
            }*/
        }
    }
}
?>