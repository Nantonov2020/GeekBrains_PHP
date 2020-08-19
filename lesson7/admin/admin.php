<?php

require_once("admin_control.php");

$tpl = file_get_contents('admin.tpl');

require_once("../config.php");
$query = "SELECT * FROM products ORDER BY id";
$result = mysqli_query($connect, $query);

$text = "";

while($data = mysqli_fetch_assoc($result)){

    $text .= "
    <div class='item'>
    <div class='id'>
        Продукт № ".$data['id']."
    </div>
    <img src='../".$data['path']."' alt='' class='img'>
    <br>
    <a href='edit_img.php?id=".$data['id']."'>Сменить изображение</a>


    <div class='name'>Название: ".$data['name']."</div>
    <div class='text'>
        Описание: ".$data['text']."
    </div>
    <div class='manufacture'>
        Производитель: ".$data['manufacture']."
    </div>
    <div class='price'>
        Цена: ".$data['price']." руб.
    </div>

    <a href='delete.php?id=".$data['id']."'>Удалить продукт</a><br>
    <a href='edit.php?id=".$data['id']."'>Редактировать продукт</a>
    </div>";
}
$patterns = ['/{text}/'];
$replace = [$text];
echo preg_replace($patterns, $replace, $tpl);
?>