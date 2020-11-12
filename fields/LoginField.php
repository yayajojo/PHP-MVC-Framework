<?php

namespace app\fields;

use app\core\form\InputField;
use app\core\Model;

class LoginField extends InputField
{
    
    public function lables($attribute)
    {
        return [
            'email' => 'Your Email',
            'password' => 'Your Password'
        ][$attribute];
    }

    
}
