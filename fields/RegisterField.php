<?php

namespace app\fields;


use mayjhao\phphmvc\form\InputField;

class RegisterField extends InputField
{
    public function lables($attribute)
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Confirm password'
        ][$attribute];
    }
    
}
