<?php
namespace app\fields;

use app\core\form\TextareaField;

class MessageField extends TextareaField
{
    public function lables($attribute)
    {
        return ['message'=>'Leave your message'][$attribute];
    }
}