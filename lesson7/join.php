<?php
$tpl = file_get_contents('join.tpl');
require_once("config.php");
require_once("admin/function.php");

$a = rand(1, 10);
$b = rand(1, 10);
$captcha = md5($a + $b);

if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass2 = htmlspecialchars($_POST['pass2']);
    $email = htmlspecialchars($_POST['email']);
    $result = md5(htmlspecialchars($_POST['result']));
    $captcha = htmlspecialchars($_POST['captcha']);

    $err = "";

    if ($result != $captcha) $err .= "Неверно введен результат выражения. ";
    if ($pass != $pass2) $err .= "Подтверждение пароля не совпадает с паролем. ";
    if (mb_strlen($pass) < 6) $err .= "Пароль не должен быть меньше 6 символов. ";
    if (mb_strlen($login) < 3) $err .= "Логин не должен быть меньше 3 символов. ";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $err .= "Введите корректный адрес электронной почты. ";

    if ($err == "")  {
        $t = "SELECT * FROM users WHERE (login='%s' OR email='%s')"; 
        $query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $email));
        $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

        while($data = mysqli_fetch_assoc($result)){
            if ($data['login'] == $login) $err .= "Пользователь с таким логином уже зарегистрирован на сайте. ";
            if ($data['email'] == $email) $err .= "Пользователь с таким e-mail уже зарегистрирован на сайте. ";
        }
    }

    if ($err == "")  {
        $pass_query = encrypt($pass);
        $t = "INSERT INTO users(login, pass, role, email) VALUES ('%s', '%s', 0, '%s')"; 
        $query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query), mysqli_real_escape_string($connect, $email));
        
        $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

        $err = "Вы успешно зарегистрированы на сайте.";
    }
}

$patterns = ['/{error}/','/{captcha}/','/{digital1}/','/{digital2}/'];
$replace = [$err, $captcha, $a, $b];
echo preg_replace($patterns, $replace, $tpl);
?>