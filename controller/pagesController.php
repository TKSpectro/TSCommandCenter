<?php
namespace app\controller;

class PagesController extends \app\core\Controller
{
    public function actionIndex()
    {
        $this->_params['title'] = 'Startseite';
        $this->_params['Header'] = true;
    }

    public function actionLogin()
    {
        $this->_params['title'] = 'Login';
    }

    public function actionError404()
    {
        $this->_params['title'] = 'Error404';
        $this->_params['Header'] = true;
    }
}