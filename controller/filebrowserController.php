<?php
namespace app\controller;

class FilebrowserController extends \app\core\Controller
{
    public function actionFilebrowser()
    {
        // ftp://username:password@subdomain.example.com/path1/path2/
        


        $this->_params['title'] = 'Dateibrowser';
    }
}