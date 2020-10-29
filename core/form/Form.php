<?php
namespace app\core\form;

class Form
{
    public static function begin($method, $action)
    {
       echo sprintf('<form method="%s" action="%s">',$method, $action);
       return new Form();
    }

    public function end()
    {
        echo '</form>';
    }

    public function field($model,$attribue)
    {
        return new Field($model,$attribue);
    }
}