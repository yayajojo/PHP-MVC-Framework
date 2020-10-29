<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $errors = [];

    public function register()
    {
        return true;
    }
    public function rules()
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [
                self::RULE_REQUIRED,
                [self::RULE_MIN, 'min' => 8],
                [self::RULE_MAX, 'max' => 16]
            ],
            'password_confirmation' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
