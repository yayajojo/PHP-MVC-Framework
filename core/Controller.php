<?php
namespace app\core;



class Controller
{

    public function render($view, $layout, array $params = [])
    {
        return Application::$app->router->renderView($view, $layout, $params);
    }

    public function registerMiddleware(Middleware $middleware)
    {
          $middleware->execute();
    }
}
