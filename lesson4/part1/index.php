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
        <div class-"wpr">
        <?php
           $files = scandir("img");
            for ($i = 2; $i < count($files); $i++){
                echo "<a href='viewer.php?name=".$files[$i]."' target='_blank'><img src='img/".$files[$i]."' class='img'></a>";
            }
        ?>
        </div>
    </div>
</body>
</html>