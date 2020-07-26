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

function mathOperation($a, $b, $tip){
    switch ($tip) {
        case "+":
            return sum($a, $b);
            break;
        case "-":
            return difference($a, $b);
            break;
        case "*":
            return multiplication($a, $b);
            break;
        case "/":
            return division($a, $b);
            break;
    }
}

$a = rand(-20,20);
$b = rand(-20,20);

echo "Переменная а равна $a. Переменная b равна $b.<hr>";

$res1 = mathOperation($a, $b, "+");
$res2 = mathOperation($a, $b, "-");
$res3 = mathOperation($a, $b, "*");

if ($b != 0)    {
    $res4 = mathOperation($a, $b, "/");
    echo "Сумма значения равна $res1. Разность равна $res2. Произведение равно $res3. Результат деления чисел равен $res4.";
} else {
    echo "Сумма значения равна $res1. Разность равна $res2. Произведение равно 0. Переменная b равна нулю. На ноль делить нельзя.";
}

?>