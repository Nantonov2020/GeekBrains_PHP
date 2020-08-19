<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


        <div class="product_wpr">
            <img src="{path}" alt="" class="img_big">
            <div class="product_wpr_wpr">
                <div class="product__title">
                    {title}
                </div>
                <div class="product__text">
                    {text}
                </div>
                <div class="product__manufacture">
                    Производитель: {manufacture}
                </div>
                <div class="product__price">
                    Цена {price} руб.
                </div>
                <button class="product__button" data-name="{id}" onClick="addToBasket()">Купить</button>
            </div>
        </div>

        <a href="index.php" class="product__link" >Вернуться в каталог товаров</a>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="src/main.js"></script>
</body>
</html>