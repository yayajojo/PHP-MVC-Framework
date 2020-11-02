<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isGet()) {
            return $this->render('register', 'auth', ['model' => $registerModel]);
        } elseif ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->register()) {
                return $this->render('home', 'main', ['name' => 'Jhao']);
            }
            return $this->render('register', 'auth', ['model' => $registerModel]);
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