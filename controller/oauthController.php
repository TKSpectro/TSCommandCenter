<?php
namespace app\controller;

class OAuthController extends \app\core\Controller
{
    public function actionOAuthLogin()
    {
        $this->_params['title'] = 'Mit Discord anmelden';
    }

    public function actionOAuthResult()
    {
        $this->_params['title'] = 'Mit Discord anmelden';
    }
}