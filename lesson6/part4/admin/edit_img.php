<?php
$id = (int)$_GET['id'];
require_once("../config.php");
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($connect, $query);

while($data = mysqli_fetch_assoc($result))
{
    $title = $data['name'];
    $text = $data['text'];
    $manufacture = $data['manufacture'];
    $price = $data['price'];
    $path = $data['path'];
}
?>

<h1>Сменить изборажение у товара № <?=$id?></h1>
<img src="../<?=$path?>" width="800">

<form action="edit_img2.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$id?>"><br><br>
        Загрузите файл:<br>
        <input type="file" name="image" accept="image/*"><br><br>

        <input type="submit" value="Добавить"><br><br>
</form>