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
                echo "<img src='img/".$files[$i]."' class='img' data-name='$files[$i]'>";
            }
        ?>
        </div>
        <div class="show_img">
            <div class="show_img1">
                <div class="close_img">X

                </div>
            </div>
            <img src="img/img1.jpg" class="big_img">

        </div>
    </div>
    <script src="src/main.js"></script>
</body>
</html>