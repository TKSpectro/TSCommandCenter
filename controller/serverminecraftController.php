<?

namespace app\controller;

class serverminecraftController extends \app\core\Controller
{
    public function actionServerminecraft()
    {
        include 'init/10_serverconfigs.php';
        $this->_params['title'] = 'Minecraft-Server';

        if (isset($_POST["minecraftCommand"]))
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
    }
}

?>