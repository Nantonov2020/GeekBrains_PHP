<?php
$id = (int)$_GET['id'];
require_once("../config.php");
$query = "DELETE FROM products WHERE id=$id";
$result = mysqli_query($connect, $query);
header('Location: admin.php');
?>