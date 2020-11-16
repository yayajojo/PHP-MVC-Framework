<?php

namespace app\models;

use mayjhao\phphmvc\UserModel;

class User extends UserModel
{ 
    use RegisterModel;
    public function disPlayName()
    {
        return $this->firstname.' '.$this->lastname; 
    }
    public static function primaryKey()
    {
        return 'id';
    }
     
    
}
