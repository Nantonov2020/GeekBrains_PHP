<?php
require_once("function.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
require_once("../config.php");
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_query = encrypt($pass);

$t = "SELECT * FROM users WHERE login='%s' AND pass='%s' AND role=1";
$query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));

$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

session_start();
if (mysqli_num_rows($result) != 1)   {
    $_SESSION['login_admin'] = "";
    $_SESSION['pass_admin'] = "";
    echo "<h1>Доступ запрещен!</h1>";
    } else { 
        $_SESSION['login_admin'] = $login;
        $_SESSION['pass_admin'] = $pass;
        echo("
        <a href='admin.php'>Редактирование каталога товаров.</a><br><br>
        <a href='order.php'>Работа с заказами.</a>
        
        ");
    }
}
else {
?>

<h1>Вход в административную панель</h1>

<form action="#" method="POST">

Введите логин:
<input type="text" name="login">
<br>
<br>
введите пароль:
<input type="PASSWORD" name="pass">

<br>
<input type="submit" value="Вход"> 
</form>

<?php
}
?>