

<?php

$arr = [1,2,4];

foreach($arr as &$a){
    $a = $a*$a;
}

print_r($arr);

