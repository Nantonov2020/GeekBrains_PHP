<?php

function power($a, $b){
    if ($b == 1)    {
        return $a;
    }
    return $a * power($a, $b-1);
}

$a = rand(3, 8);
$b = rand(2, 5);

//$a = $b = 3;

echo "Переменная а равна $a. Переменная b равна $b. Переменная а будет возведена в степень b.<hr>";
echo power($a, $b);
?>