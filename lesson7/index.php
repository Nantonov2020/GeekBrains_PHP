<?php
$tpl = file_get_contents('index.tpl');
require_once("config.php");

session_start();
if ($_SESSION['login']) {
    $productsFromBasket = [];
    $login = $_SESSION['login'];
    $query =    "SELECT products.id as id, baskets.count as count, products.name as name, products.price as price  
                FROM users,baskets,products WHERE ((users.id=baskets.id_users)AND(products.id=baskets.id_product)
                AND(users.login='$login'))"; 
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    $countAllProducts = 0;
    while($data = mysqli_fetch_assoc($result)){
        $productsFromBasket[] = $data;
        $countAllProducts+=$data['count'];
    }
    $infoAboutBasket = ['count'=>$countAllProducts, 'text'=>1, 'all'=>$productsFromBasket];
    $valueForBasket = json_encode($infoAboutBasket);
    $textLogin = "Вы на сайте под логином:".$_SESSION['login']. "<button id='basket' class='basket'> Корзина($countAllProducts товаров)</button>
    <input type='hidden' class='products_of_basket' value='$valueForBasket'></input>";
}else{
    $textLogin = "Вы не авторизованы на сайте. <a href='enter.php'>Войти</a><button id='basket' class='basket' style='display:none'> Корзина </button>";
}

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
        <button class='item__button' data-name=".$data['id'].">Добавить в корзину</button>
    </div>
    </div> 
    "; 
}
$link = '<link rel="stylesheet" href="style.css?t='.microtime().' type="text/css" />';
$patterns = ['/{items}/','/{login}/','/{link}/'];
$replace = [$show,$textLogin,$link];
echo preg_replace($patterns, $replace, $tpl);
?>