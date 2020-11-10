<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use PDO;

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
                [self::RULE_EXISTS,'table'=>'users','column'=>'email']
            ],
            'password' => [
                self::RULE_REQUIRED,
            ],
           
        ];
    }
    public function login()
    {
        
        $user = (new User)->findOne(['email'=> $this->email]);

        if(!password_verify($this->password, $user->password)){
           $this->addErrors('password','Password is incorrect');
           return false;
        }else{
            return Application::$app->login($user);
        };
    }
    
}
