<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class ProfileController extends Controller
{
   public function __construct()
   {
       $this->registerMiddleware(new AuthMiddleware(['profile']));
   }
    
    public function create()
    {

        return $this->render('profile','main');
    }
    
}
