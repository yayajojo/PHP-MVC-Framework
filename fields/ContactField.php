<?php
namespace app\fields;
use app\core\form\InputField;

class ContactField extends InputField
{
    public function lables($attribute)
    {
        return ['name'=>'Your name',
        'email'=>'Your email'][$attribute];
    }
    
}