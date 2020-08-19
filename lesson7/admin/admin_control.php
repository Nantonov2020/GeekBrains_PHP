<?php
require_once("function.php");
require_once("../config.php");
session_start();
$login = $_SESSION['login_admin'];
$pass = $_SESSION['pass_admin'];
$pass_query = encrypt($pass);

$t = "SELECT * FROM users WHERE login='%s' AND pass='%s' AND role=1";
$query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));

$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

if (mysqli_num_rows($result) != 1)   {
    header('Location: index.php');
    }
?>