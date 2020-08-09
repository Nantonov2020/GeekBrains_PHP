<?php
require_once("../config.php");

$id = (int)$_POST['id'];
$name = htmlspecialchars($_POST['name']);
$text = htmlspecialchars($_POST['text']);
$price = (int)$_POST['price'];
$manufacture = htmlspecialchars($_POST['manufacture']);

$query = "UPDATE products SET name='$name', text='$text', price=$price, manufacture='$manufacture' WHERE id=$id";
mysqli_query($connect, $query);
header('Location: admin.php');
?>