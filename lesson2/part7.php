<?php
// получаем текущие значения часов и минут.
$a = date("H");
$b = date("i");

//Раскладываем часы на первую и вторую цифру.
$a1 = (int)$a % 10;
$a2 = ((int)$a - $a1)/10;

//Раскладываем минуты на первую и вторую цифру.
$b1 = (int)$b % 10;
$b2 = ((int)$b - $b1)/10;

echo "Сейчас ".$a2.$a1." ".setTextHours($a1, $a2)." ".$b2.$b1." ".setTextMinutes ($b1, $b2);

function setTextHours ($a1, $a2){
    if ($a2 == 1) return "часов";
    if ($a1 == 1) return "час";
    if ($a1 > 1 && $a1 < 5) return "часа";
    return "часов";
}

function setTextMinutes ($b1, $b2){
    if ($b2 == 1) return "минут";
    if ($b1 == 1) return "минута";
    if ($b1 > 1 && $b1 < 5) return "минуты";
    return "минут";
}
?>