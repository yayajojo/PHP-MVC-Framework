<?php

namespace app\controllers;


use mayjhao\phphmvc\Controller;
use mayjhao\phphmvc\middlewares\AuthMiddleware;


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
