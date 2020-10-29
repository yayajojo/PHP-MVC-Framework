<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public $request;
    public $response;
    public $router;
    public static $app;
    
    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$app = $this;
        
    }
    public function run(){
        $this->router->resolve();
    }
}
