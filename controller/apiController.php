<?php
namespace app\controller;

class ApiController extends \app\core\Controller
{
    public function actionApiBrowsefiles(){
        
    }
    public function actionApiUpdate(){
        
    }
    public function actionApiGetuser(){
        error_reporting(0);

        if(isset($_GET['discordID'])) {
            $discordID = $_GET['discordID'];
            $result = \Discord::requestAsBot(\Config::get('api_endpoint').'/users/'.$discordID, false);

            var_dump($result);

            $avatarURL = 'https://cdn.discordapp.com/avatars/'.$discordID.'/'.$result->avatar.'.png?size=128' ;
            $username = $result->username.'#'.$result->discriminator;
        
            echo json_encode(array('avatar' => $avatarURL, 'username' => $username));
        } else {
            echo json_encode('Null');
        }
    }
}