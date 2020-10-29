<?php
namespace app\core;



class Controller
{

    public function render($layout, $view, array $params = [])
    {
        return Application::$app->router->renderView($layout, $view, $params);
    }
}
