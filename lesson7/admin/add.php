<?php
require_once("admin_control.php");
require_once("../config.php");

$name = htmlspecialchars($_POST['name']);
$text = htmlspecialchars($_POST['text']);
$price = (int)$_POST['price'];
$manufacture = htmlspecialchars($_POST['manufacture']);

$path = "../img/".$_FILES['image']['name']; // Путь куда нужно сохранить загруженный файл
move_uploaded_file($_FILES['image']['tmp_name'], $path);


$path = "img/".$_FILES['image']['name'];  //Путь для сохранения в базе.

$query = "INSERT INTO products(name, text, price, manufacture, path) VALUES ('$name', '$text', $price, '$manufacture', '$path')";
mysqli_query($connect, $query);

header('Location: admin.php');
?>