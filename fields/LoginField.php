<?php

namespace app\fields;

use mayjhao\phphmvc\form\InputField;
use mayjhao\phphmvc\Model;

class LoginField extends InputField
{
    
    public function labels($attribute)
    {
        return [
            'email' => 'Your Email',
            'password' => 'Your Password'
        ][$attribute];
    }

    
}
