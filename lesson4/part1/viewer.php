<?php
$img =$_GET['name'];
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
            <img src="img/<?= $img?>" class="img_big">
            <a href="index.php" class="link">Назад к галерее</a>
        </div>
    </div>
</body>
</html>