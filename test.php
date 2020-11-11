
<?php

class A
{
    public $action;
    public function __construct($x)
    {
        $this->action = $x;
        $this->name = $this->getName();
    }

    public function getName()
    {
        return 'yaya';
    }
}

echo (new A)->name;