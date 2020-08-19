<?php

/**
 * Функиця получает логин пользователя и выдает в формате
 * json информацию с количеством товара, 1 (нужна для JS для вывода сообщения при 
 * добавлении товара) и массив с товарами, находящимися в корзине у данного
 * пользователя.
 */
function getSetOfProduktsFromBasket($login){
    require_once("config.php");

    $productsFromBasket = [];

    $query = "SELECT products.id as id, baskets.count as count, products.name as name, products.price as price FROM users,baskets,products WHERE ((users.id=baskets.id_users)AND(products.id=baskets.id_product) AND(users.login='$login'))"; 
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    $countAllProducts = 0;
    while($data = mysqli_fetch_assoc($result)){
        $productsFromBasket[] = $data;
        $countAllProducts+=$data['count'];
    }
    $infoAboutBasket = ['count'=>$countAllProducts, 'text'=>1, 'all'=>$productsFromBasket];
    return json_encode($infoAboutBasket);
}    

