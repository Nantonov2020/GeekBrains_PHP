<?php
$tpl = file_get_contents('product.tpl');
$id = (int)$_GET['id'];

require_once("config.php");

$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($connect, $query);

while($data = mysqli_fetch_assoc($result))
{
    $title = $data['name'];
    $text = mb_substr($data['text'], 0, 1000);
    $manufacture = $data['manufacture'];
    $price = $data['price'];
    $path = $data['path'];
}

$patterns = ['/{title}/','/{text}/','/{manufacture}/','/{price}/','/{path}/'];
$replace = [$title, $text, $manufacture, $price, $path];
echo preg_replace($patterns, $replace, $tpl);

?>