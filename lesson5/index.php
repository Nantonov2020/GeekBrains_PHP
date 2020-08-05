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
    <h1 class="title">Галерея фотографий</h1>
        <div class="wpr">

        <?php
        require_once("config.php");
        $query = "SELECT * FROM images ORDER BY count DESC";
        $result = mysqli_query($connect, $query);
        while($data = mysqli_fetch_assoc($result)):?>
            <div>
            <a href='viewer.php?id=<?=$data['id']?>' target='_blank'><img src='<?=$data['path']?>' class='img'></a><br>
            <span class='title2'><?=$data['name']?></span><br>
            <span class='count'>Кол-во просмотров: <?=$data['count']?></span><br>
            <span class='size'>Размер изображения: <?=$data['size']?> байт</span>
            </div>
        <?php
            endwhile;
        ?>

        </div>
    </div>
</body>
</html>