<?php

namespace app\controllers;


use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home','main');
    }

    public function contact(Request $request)
    {
       if($request->isGet()){
           return $this->render('contact','main');
       }else if($request->isPost()){
        
       }
    }
}
