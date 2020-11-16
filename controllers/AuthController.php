<?php

namespace app\controllers;

use mayjhao\phphmvc\Application;
use mayjhao\phphmvc\Controller;
use mayjhao\phphmvc\Request;
use mayjhao\phphmvc\Response;
use app\models\LoginModel;
use app\models\User;

class AuthController extends Controller
{
    public function register(Request $request, Response $response)
    {
        $user = new User();
        if ($request->isGet()) {
            return $this->render('register', 'auth', ['model' => $user]);
        } elseif ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thank you for registering.');
                $response->redirect('/');
            }
            return $this->render('register', 'auth', ['model' => $user]);
        }
    }

    public function login(Request $request, Response $response)
    {
        $user = new LoginModel();
        if ($request->isGet()) {
            return $this->render('login', 'auth', ['model' => $user]);
        } elseif ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->login()) {
                $response->redirect('/');
                
            }
            return $this->render('login', 'auth', ['model' => $user]);
        }
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout('user');
        $response->redirect('/');

    }
}
