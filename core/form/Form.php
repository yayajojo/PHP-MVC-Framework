<?php
namespace app\core\form;


use app\core\Model;


abstract class Form
{
    public function begin($method, $action)
    {
       echo sprintf('<form method="%s" action="%s">',$method, $action);
       return $this;
    }

    public function end()
    {
        echo '</form>';
    }

    abstract public function field(Model $model,string $attribue, $type='text');
   
}