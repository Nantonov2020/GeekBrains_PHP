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
                <button class="product__button" disabled>Купить</button>
            </div>
        </div>

        <a href="index.php" class="product__link">Вернуться в каталог товаров</a>
    </div>
</body>
</html>