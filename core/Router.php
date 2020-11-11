<?php

namespace app\core;

use app\core\exceptions\NotFoundException;

class Router
{
    protected $routes = [];
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $action)
    {
        $this->routes['get'][$path] = $action;
    }
    
    public function post($path, $action)
    {
        $this->routes['post'][$path] = $action;
    }

    protected function layout($layout)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function viewContent($view, array $params = [])
    {
        foreach($params as $key=>$val){
            $$key = $val;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
    public function renderView($view, $layout = 'main' ,array $params= [])
    {
        $viewContent = $this->viewContent($view, $params);
        
        $layoutContent = $this->layout($layout);
        
        return str_replace("{{content}}", $viewContent ,$layoutContent);
    }

    public function renderOnlyView($view, array $params= [])
    {
        $viewContent = $this->viewContent($view, $params);
        return $viewContent;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $action =  $this->routes[$method][$path] ?? false;
        $this->routeCallback($action);
    }
    protected function routeCallback($action)
    {
        if ($action == false) {
            throw new NotFoundException();
        } elseif (is_array($action)) {
            $controller = new $action[0]();
            $action = $action[1];
            Application::$app->controller = $controller;
            Application::$app->controller->action = $action;
            foreach($controller->getMiddlewares() as $middleware){ 
                $middleware->execute();
            }
            echo call_user_func([$controller,$action],$this->request, $this->response);
        } else{
            echo call_user_func($action);
        }
    }
}
