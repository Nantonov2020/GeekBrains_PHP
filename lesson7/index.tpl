<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {link}


    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="basket_window">
            <div class="close_basket"> <div class="close"> X </div> </div>
            <div class="basket_table"></div>
        </div>

        <div class="header">
        {login}
        </div>

        <h1 class="title">Каталог товаров</h1>
        <div class="wpr">

        {items}

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/main.js"></script>
</body>
</html>