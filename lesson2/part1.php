<?php
    $a = rand(-10,10);
    $b = rand(-10,10);

    echo(" Переменная а равна $a. Переменная b равна $b<br>");

    if ($a >= 0 && $b >= 0) {
        echo $a - $b;
    } elseif ($a < 0 && $b < 0) {
        echo $a * $b;
    } else {
        echo $a + $b;
    }
?>
