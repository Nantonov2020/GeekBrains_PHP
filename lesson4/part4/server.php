<?php
print_r($_FILES);

echo("br");
echo("br");

$path = "big/".$_FILES['image']['name']; // Путь куда нужно сохранить загруженный файл
if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
    echo("<br>Файл успешно загружен.");
}

include("function.php");

$path_small = "small/".$_FILES['image']['name'];
img_resize($path, $path_small, 300, 0);

?>