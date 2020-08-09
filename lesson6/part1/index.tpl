<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="color:red">{error}</p>
    <form action="#" method="POST">
    <input name="digital1" type="text" value="{digital1}" placeholder="Введите первое число.">
    <select name="operation">
        <option {selected1} value="1">+</option>
        <option {selected2} value="2">-</option>
        <option {selected3} value="3">*</option>
        <option {selected4} value="4">/</option>
    <select>
    <input name="digital2" type="text" value="{digital2}" placeholder="Введите второе число.">

    <input type="submit" value=" = ">
    <input type="text" value="{result}" disabled>
    </form>
</body>
</html>