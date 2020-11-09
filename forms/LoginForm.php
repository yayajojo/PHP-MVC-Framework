<?php
namespace app\forms;
use app\core\form\Form;
use app\fields\LoginField;

class LoginForm extends Form
{
    public function field($model,string $attribue, $type='text')
    {
        return new LoginField($model,$attribue, $type);
    }
}