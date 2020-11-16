<?php

namespace app\models;

use mayjhao\phphmvc\Model;

class Contact extends Model
{
    public $email = '';
    public $name = '';
    public $message = '';
    public $errors = [];
    public function rules()
    {
        return [
        'email'=>[self::RULE_REQUIRED, 
        self::RULE_EMAIL],
        'name'=>[self::RULE_REQUIRED],
        'message'=>[self::RULE_REQUIRED]
        ];
    }
    public function send()
    {
        return true;
    }
}