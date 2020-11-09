<?php
namespace app\forms;

use app\core\Model;
use app\core\form\Form;
use app\fields\RegisterField;

class RegisterForm extends Form
{
    
    public function field(Model $model,string $attribue, $type='text')
    {
        return new RegisterField($model,$attribue,$type);
    }
}