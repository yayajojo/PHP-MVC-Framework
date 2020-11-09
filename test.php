

<?php

 class A
{
    public function calls()
    {   
        var_dump($this);
    }
    public function test()
    {
         echo 'test';
    }
}

class B extends A
{
    
}

(new B())->calls();
(new A())->calls();