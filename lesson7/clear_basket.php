<?php
require_once("config.php");
require_once("admin/function.php");
require_once("function.php");
session_start();

$login = $_SESSION['login'];
$pass = $_SESSION['pass'];

$pass_query = encrypt($pass);
$t = "SELECT * FROM users WHERE (login='%s' AND pass='%s')"; 
$query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));
$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
while($data = mysqli_fetch_assoc($result)){
    $idUsers = $data['id'];
}

if (mysqli_num_rows($result) == 1) { // Если есть такой пользователь, то добавляем чистим корзину.
    $query = "DELETE FROM baskets WHERE id_users=$idUsers";
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
}

header('Location: index.php');
