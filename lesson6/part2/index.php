<?php
$tpl = file_get_contents('index.tpl');
$digital1 = $digital2 = $result = $error = "";
$button1 = $button2 = $button3 = $button4 = "disabled";

if (isset($_POST['but1']))  {
    $operation = 1;
} elseif (isset($_POST['but2'])) {
    $operation = 2;
} elseif (isset($_POST['but3'])) {
    $operation = 3;
} elseif (isset($_POST['but4'])) {
    $operation = 4;
} else {
    $operation = 0;
}

if (($operation > 0)&&($operation < 5)) {
    (!is_numeric($_POST['digital1']))?($error = "Необходимо ввести первое число. "):($digital1 = (int)$_POST['digital1']);
    (!is_numeric($_POST['digital2']))?($error .= "Необходимо ввести второе число. "):($digital2 = (int)$_POST['digital2']);
    if ($error == "") {
        if (($operation == 4)&&($digital2 == 0)) {
            $error .= "Деление на ноль запрещено!";
        } else {
           $result = mathOperation($digital1, $digital2, $operation); 
        }
    }
    switch ($operation) {
        case 1:
            $button1 = "active";
            break;
        case 2:
            $button2 = "active";
            break;
        case 3:
            $button3 = "active";
            break;
        case 4:
            $button4 = "active";
    }
}
$patterns = ['/{digital1}/','/{digital2}/','/{result}/','/{error}/','/{button1}/','/{button2}/','/{button3}/','/{button4}/'];
$replace = [$digital1, $digital2, $result, $error, $button1, $button2, $button3, $button4];
echo preg_replace($patterns, $replace, $tpl);

function mathOperation($a, $b, $tip){
    switch ($tip) {
        case 1:
            return $a + $b;
            break;
        case 2:
            return $a - $b;
            break;
        case 3:
            return $a * $b;
            break;
        case 4:
            return $a / $b;
            break;
    }
}
?>