<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? - оператор простого сравнения сравнивает содержимое. При этом тип переменных не учитываются
    echo('<br>');
    var_dump((int)'012345');     // Почему 12345? - скобки перед переменной с указанием типа дает указание на перевод типа переменной в числовой.
    echo('<br>');
    var_dump((float)123.0 === (int)123.0); // Почему false? - Левая часть выражения приведена к строковому типу данных. Правая часть выражения приведена к целому типу данных 
    // между выражениями стоит оператор тождественного равенства, который учитывает тип переменных. Поэтому выражения не равны, что дает false.
    echo('<br>');
    var_dump((int)0 === (int)'hello, world'); // Почему true?
    // В правом выражении попытка перевести строку в число дает 0. Поэтому выражения равны.
    echo('<br>');
?>