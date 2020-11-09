<?php
namespace app\fields;

use app\core\form\Field;

class LoginField extends Field
{
    public function lables($attribute)
    {
        return [
            'email'=>'Email',
            'password'=>'Password'
        ][$attribute];
    }
}