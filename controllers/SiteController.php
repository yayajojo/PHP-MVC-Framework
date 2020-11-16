<?php

namespace app\controllers;

use mayjhao\phphmvc\Application;
use mayjhao\phphmvc\Controller;
use mayjhao\phphmvc\Request;
use mayjhao\phphmvc\Response;
use app\models\Contact;


class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home','main');
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new Contact();
       if($request->isGet()){
           return $this->render('contact','main',['model'=>$contact]);
       }else if($request->isPost()){
           $contact->loadData($request->getBody());
           if($contact->validate() && $contact->send()){
              Application::$app->session->setFlash('success','You already send the email.');
              $response->redirect('/');
           }
           return $this->render('contact', 'main', ['model' => $contact]);
        
       }
    }
}
