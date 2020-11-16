<?php
namespace app\fields;
use mayjhao\phphmvc\form\InputField;

class ContactField extends InputField
{
    public function lables($attribute)
    {
        return ['name'=>'Your name',
        'email'=>'Your email'][$attribute];
    }
    
}