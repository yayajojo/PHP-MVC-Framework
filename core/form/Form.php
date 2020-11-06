<?php
namespace app\core\form;

use app\core\DbModel;
use app\core\Model;

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

    public function field(DbModel $model,string $attribue, $type='text')
    {
        return new Field($model,$attribue,$type);
    }
}