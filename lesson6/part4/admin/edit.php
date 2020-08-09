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
<form method="POST" action="edit2.php">
<input type="hidden" name="id" value="<?=$id?>">

Наименование: <input type="text" name="name" value="<?=$title?>">
<br>
<br>
Описание: 
<textarea name="text" cols="50" rows="15">
<?=$text?>
</textarea>
<br>
<br>
Производитель: <input type="text" name="manufacture" value="<?=$manufacture?>">
<br>
<br>
Цена: <input type="text" name="price" value="<?=$price?>">
<br>
<br>
<input type="submit" value="Обновить">
</form>