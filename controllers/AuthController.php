<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $User = new User();
        if ($request->isGet()) {
            return $this->render('register', 'auth', ['model' => $User]);
        } elseif ($request->isPost()) {
            $User->loadData($request->getBody());
            if ($User->validate() && $User->save()) {
                return $this->render('home', 'main', ['name' => 'Jhao']);
            }
            return $this->render('register', 'auth', ['model' => $User]);
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
