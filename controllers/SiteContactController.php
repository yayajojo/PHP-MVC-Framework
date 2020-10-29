<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteContactController extends Controller
{

    public function handleContact(Request $request)
    {

        var_dump($request->getBody());
    }
    public function create()
    {

        return $this->render('contact','main');
    }
    
}
