<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\LoginModel;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new RegisterModel();
        if ($request->isGet()) {
            return $this->render('register', 'auth', ['model' => $user]);
        } elseif ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thank you for registering.');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', 'auth', ['model' => $user]);
        }
    }

    public function login(Request $request)
    {
        $user = new LoginModel();
        if ($request->isGet()) {
            return $this->render('login', 'auth', ['model' => $user]);
        } elseif ($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->login()){
                Application::$app->response->redirect('/');
            }
            return $this->render('login', 'auth', ['model' => $user]);
        }
    }
}
