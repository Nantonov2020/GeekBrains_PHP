<?php
$tpl = file_get_contents('product.tpl');
require_once("config.php");
$id = (int)$_GET['id'];

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

    $textLogin = "Вы на сайте под логином:".$_SESSION['login']. "<button id='basket' class='basket'> Корзина($countAllProducts товаров) </button>
    <input type='hidden' class='products_of_basket' value='$valueForBasket'></input>";
}else{
    $textLogin = "Вы не авторизованы на сайте. <a href='enter.php'>Войти</a><button id='basket' class='basket' style='display:none'> Корзина </button>";
}

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

$patterns = ['/{title}/','/{text}/','/{manufacture}/','/{price}/','/{path}/','/{login}/','/{id}/'];
$replace = [$title, $text, $manufacture, $price, $path, $textLogin,$id];
echo preg_replace($patterns, $replace, $tpl);

?>