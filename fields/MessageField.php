<?php
namespace app\fields;

use mayjhao\phphmvc\form\TextareaField;

class MessageField extends TextareaField
{
    public function labels($attribute)
    {
        return ['message'=>'Leave your message'][$attribute];
    }
}