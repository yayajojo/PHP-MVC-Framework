<?php

namespace app\fields;

use app\core\form\Field;


class RegisterField extends Field
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
