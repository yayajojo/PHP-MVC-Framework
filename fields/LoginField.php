<?php

namespace app\fields;

use mayjhao\phphmvc\form\InputField;
use mayjhao\phphmvc\Model;

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
