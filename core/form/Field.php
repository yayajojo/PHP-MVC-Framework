<?php

namespace app\core\form;

use app\core\DbModel;


class Field
{
    protected $model;
    protected $attribute;
    protected $type;

    public function __construct(DbModel $model, string $attribute, string $type = 'text')
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
    }

    public function __toString()
    {
        return sprintf(
            '<div class="form-group">
        <label for="%s">%s</label>
        <input type="%s" 
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
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' invalid-feedback' : '',
            $this->model->hasError($this->attribute) ? $this->model->getFirstError($this->attribute) : '',
        );
    }
}
