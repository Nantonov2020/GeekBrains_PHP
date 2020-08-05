<?php
$id =$_GET['id'];
require_once("config.php");

$query = "UPDATE images SET count=count+1 WHERE id=$id";
mysqli_query($connect, $query);

$query = "SELECT * FROM images WHERE id=$id";
$result = mysqli_query($connect, $query);
while($data = mysqli_fetch_assoc($result)){
    $name = $data[name];
    $path = $data['path'];
    $size = $data['size'];
    $count = $data['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="wpr2">
            <img src="<?= $path?>" class="img_big"><br>
            <span class='title2'><?=$name?></span><br>
            <span class='count'>Кол-во просмотров: <?=$count?></span><br>
            <span class='size'>Размер изображения: <?=$size?> байт</span>
            <a href="index.php" class="link">Назад к галерее</a>
        </div>
    </div>
</body>
</html>