<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <p style="color:red">{error}</p>
    <form action="#" method="POST">
        Введите логин (не менее 3 символов):
        <input type="text" name="login"><br>

        Введите Ваш e-mail:
        <input type="text" name="email"><br>

        Введите пароль (не менее 6 символов):
        <input type="password" name="pass"><br>
        Повторите пароль:
        <input type="password" name="pass2"><br>
        <br>
        Введите результат выражения:
        <br>
        {digital1} + {digital2}<br>
        <input type="text" name="result"><br>
        <input type="hidden" value="{captcha}" name="captcha">
        <input type="submit" value="Зарегистрироваться"><br>
        <input type="reset" value="Отмена"><br>
    </form>
</body>
</html>