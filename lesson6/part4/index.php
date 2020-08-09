<?php
$tpl = file_get_contents('index.tpl');
require_once("config.php");

$query = "SELECT * FROM products ORDER BY price DESC";
$result = mysqli_query($connect, $query);

$show = "";

while($data = mysqli_fetch_assoc($result))
{
    
    ((mb_strlen($data['text'])) > 250)?($text = mb_substr($data['text'],0,250)."..."):($text = $data['text']);
    $show .= "
    <div class='item'>
    <img src='".$data['path']."' alt='' class='item_img'>
    <div class='item__wpr'>
        <div class='item__title'>".$data['name']."</div>
        <div class='item__text'>".$text."</div>
        <div class='item__manufacturer'>Производитель: ".$data['manufacture']."</div> 
        <div class='item__price'>Цена: ".$data['price']." руб.</div>
        <a class='item__link' href='product.php?id=".$data['id']."'>Подробнее..</a>
    </div>
    </div> 
    "; 
}

$patterns = ['/{items}/'];
$replace = [$show];
echo preg_replace($patterns, $replace, $tpl);
?>