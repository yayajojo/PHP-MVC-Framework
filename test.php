<?php
namespace app;
class ClassOne
{
    public function shout()
    {
        echo 'haha';
    }
}
$str = 'One';
$class = 'app\Class' . $str;
$object = (new $class())->shout();
