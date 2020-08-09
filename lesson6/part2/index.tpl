<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p style="color:red">{error}</p>
    <form action="#" method="POST">
        <input name="digital1" type="text" value="{digital1}" placeholder="Введите первое число.">
        <input name="digital2" type="text" value="{digital2}" placeholder="Введите второе число.">
        <br>
        <br>
        <input type="submit" value=" + " class="{button1}" name="but1">
        <input type="submit" value=" - " class="{button2}" name="but2">
        <input type="submit" value=" * " class="{button3}" name="but3">
        <input type="submit" value=" / " class="{button4}" name="but4">
        <br>
        <br>
        <input type="text" value="{result}" disabled>
    </form>
</body>
</html>