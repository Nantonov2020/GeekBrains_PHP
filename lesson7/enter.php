<?php
$tpl = file_get_contents('enter.tpl');
require_once("config.php");
require_once("admin/function.php");

$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')   {

    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);
    //echo($login);

    //echo($pass);
    if ((mb_strlen($pass) < 6)||(mb_strlen($login) < 3)) $err .= "Некорректно введен логин или пароль.";

    if ($err == "") {
        $pass_query = encrypt($pass);
        $t = "SELECT * FROM users WHERE (login='%s' AND pass='%s')"; 
        $query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));
        $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

        session_start();
        if (mysqli_num_rows($result) == 1)  {
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            header('Location: index.php');
        } else {
            $_SESSION['login'] = "";
            $_SESSION['pass'] = "";
            $err = "Ошибка ввода логина или пароля.";
        }
    }
}

$patterns = ['/{error}/'];
$replace = [$err];
echo preg_replace($patterns, $replace, $tpl);

?>