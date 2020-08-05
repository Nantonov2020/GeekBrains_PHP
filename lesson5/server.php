<?php
print_r($_FILES);
$name = $_POST['name'];
$size = $_FILES['image']['size'];

echo("<br>");
echo("<br>");

$path = "img/".$_FILES['image']['name']; // Путь куда нужно сохранить загруженный файл
if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
    echo("<br>Файл успешно загружен.");
}

require_once("config.php");
$query = "INSERT INTO images(name, path, size) VALUES ('$name', '$path', $size)";
//echo $query;
mysqli_query($connect, $query);

?>