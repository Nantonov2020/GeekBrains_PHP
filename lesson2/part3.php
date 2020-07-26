<?php

function sum($a, $b) {
    return $a + $b;
}

function difference($a, $b) {
    return $a - $b;
}

function multiplication($a, $b) {
    return $a * $b;
}

function division($a, $b) {
    return $a / $b;
}

$a = rand(-20,20);
$b = rand(-20,20);

echo "Переменная а равна $a. Переменная b равна $b.<hr>";

$res1 = sum($a, $b);
$res2 = difference($a, $b);
$res3 = multiplication($a, $b);

if ($b != 0)    {
    $res4 = division($a, $b);
    echo "Сумма значения равна $res1. Разность равна $res2. Произведение равно $res3. Результат деления чисел равен $res4.";
} else {
    echo "Сумма значения равна $res1. Разность равна $res2. Произведение равно $res3. Переменная b равна нулю. На ноль делить нельзя.";
}

?>