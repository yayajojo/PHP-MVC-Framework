<?php

namespace app\controllers;


use app\core\Controller;
use app\core\middlewares\AuthMiddleware;


class ProfileController extends Controller
{
   public function __construct()
   {
       $this->registerMiddleware(new AuthMiddleware(['create']));
   }
    
    public function create()
    {

        return $this->render('profile','main');
    }
    
}
