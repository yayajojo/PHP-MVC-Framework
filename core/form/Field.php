<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    protected $model;
    protected $attribute;

    public function __construct(Model $model,string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    public function __toString()
    {
        return sprintf(
        '<div class="form-group">
        <label for="%s">%s</label>
        <input type="text" 
        class="form-control %s" 
         name="%s" 
         value="%s"
         >
         <div class="%s">
         %s
         </div>
         </div>', 
    $this->attribute,
    ucfirst($this->attribute),
    $this->model->hasError($this->attribute) ? ' is-invalid' : '',
    $this->attribute,
    $this->model->{$this->attribute},
    $this->model->hasError($this->attribute) ? ' invalid-feedback' : '',
    $this->model->hasError($this->attribute)?$this->model->getFirstError($this->attribute):'',
    ); 
    }
}