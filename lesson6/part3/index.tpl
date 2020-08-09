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
        <section class="reviews">
            <h1 class="reviews__title">Отзывы</h1>
            {reviews}
        </section>

        <section class="send">
            <form action="#" method="POST">
                <div>Ваше имя:</div>
                <input type="text" name="name">
                <div>Отзыв:</div>
                <textarea name="text" cols="90" rows="20">
                </textarea>
                <br>
                Введите результат выражения:
                <br>
                {digital1} + {digital2}<br>
                <input type="text" name="result">
                <br>
                <input type="hidden" value="{captcha}" name="captcha">
                <input type="submit" value="Отправить">
                <input type="reset" value="Сбросить">
            </form>
        </section>
    </div>

</body>
</html>