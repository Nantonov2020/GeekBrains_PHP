<?php
$i = 0;
do {
    echo $i;
    if ($i == 0) {
        echo "- ноль<br>";
        } elseif ($i % 2 == 0) {
            echo "- четное число.<br>";
        } else {
            echo "- нечетное число.<br>";
        }
    $i++;    
    } while ($i <= 10);
?>