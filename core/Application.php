<?php

namespace app\core;

use app\models\User;

class Application
{
    public static $ROOT_DIR;
    public $request;
    public $response;
    public $router;
    public static $app;
    public $db;
    public $session;
    public $userClass;

    public function __construct(string $rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$app = $this;
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->userClass = $config['userClass'];
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = (new $this->userClass())->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }
    public function run()
    {
        $this->router->resolve();
    }

    public function isGuest()
    {
        return !(bool)$this->user;
    }
    public function login(DbModel $user)
    {
        $primaryKey = $this->userClass::primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}
