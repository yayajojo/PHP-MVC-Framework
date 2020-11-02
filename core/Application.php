<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public $request;
    public $response;
    public $router;
    public static $app;
    public $db;
    
    public function __construct(string $rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$app = $this;
        $this->db = new Database($config['db']);
        
    }
    public function run(){
        $this->router->resolve();
    }
}
