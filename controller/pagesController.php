<?php
namespace app\controller;

class PagesController extends \app\core\Controller
{
    public function actionIndex()
    {
        $this->_params['title'] = 'Dashboard';
        $this->_params['Header'] = true;
    }

    public function actionLogin()
    {
        $this->_params['title'] = 'Login';
    }

    public function actionLogout()
    {
        $this->_params['title'] = 'Logout';
    }

    public function actionError404()
    {
        $this->_params['title'] = 'Not Found';
        $this->_params['Header'] = true;
    }
}