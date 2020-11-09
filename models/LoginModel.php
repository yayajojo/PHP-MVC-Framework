<?php

namespace app\models;

use app\core\Model;

class LoginModel extends Model
{
    public $email = '';
    public $password = '';
    public $errors = [];
    public function rules()
    {
        return [
            
            'email' => [
                self::RULE_REQUIRED, 
                self::RULE_EMAIL,
                [self::RULE_EXISTS,'table'=>'users','column'=>'']
            ],
            'password' => [
                self::RULE_REQUIRED,
    
            ],
           
        ];
    }
    
}
