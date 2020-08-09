    <?php
        $tpl = file_get_contents('index.tpl');
        $digital1 = $digital2 = $result = $selected1 = $selected2 = $selected3 = $selected4 = $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
            (!is_numeric($_POST['digital1']))?($error = "Необходимо ввести первое число. "):($digital1 = (int)$_POST['digital1']);
            (!is_numeric($_POST['digital2']))?($error .= "Необходимо ввести второе число. "):($digital2 = (int)$_POST['digital2']);

            $operation = (int)$_POST['operation'];
            if ($error == "") {
                if (($operation == 4)&&($digital2 == 0)) {
                    $error .= "Деление на ноль запрещено!";
                } else {
                   $result = mathOperation($digital1, $digital2, $operation); 
                }
            }

            $val = "selected".$operation;
            $$val = "selected";
        }

        $patterns = ['/{digital1}/','/{digital2}/','/{result}/','/{error}/','/{selected1}/','/{selected2}/','/{selected3}/','/{selected4}/'];
        $replace = [$digital1, $digital2, $result, $error, $selected1, $selected2, $selected3, $selected4];
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