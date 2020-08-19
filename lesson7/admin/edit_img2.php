<?php
require_once("admin_control.php");
require_once("../config.php");
$id = (int)$_POST['id'];

$path = "../img/".$_FILES['image']['name']; // Путь куда нужно сохранить загруженный файл
move_uploaded_file($_FILES['image']['tmp_name'], $path);
$path = "img/".$_FILES['image']['name'];  //Путь для сохранения в базе.

$query = "UPDATE products SET path='$path' WHERE id=$id";
mysqli_query($connect, $query);

header('Location: admin.php');
?>