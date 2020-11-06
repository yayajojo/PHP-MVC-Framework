<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
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
        if ($request->isGet()) {
            return $this->render('login', 'main');
        } elseif ($request->isPost()) {
        }
    }
}
