<?php
require_once("config.php");
require_once("admin/function.php");
session_start();

$login = $_SESSION['login'];
$pass = $_SESSION['pass'];
$idProducts = (int)$_POST[id];

$pass_query = encrypt($pass);
$t = "SELECT * FROM users WHERE (login='%s' AND pass='%s')"; 
$query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));
$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
while($data = mysqli_fetch_assoc($result)){
    $idUsers = $data['id'];
}

if (mysqli_num_rows($result) == 1) { // Если есть такой пользователь, то добавляем заказ в корзину или убираем из корзины.

    $t = "SELECT * FROM baskets WHERE (id_users=%d AND id_product=%d)";
    $query = sprintf($t, mysqli_real_escape_string($connect, $idUsers), mysqli_real_escape_string($connect, abs($idProducts)));
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    while($data = mysqli_fetch_assoc($result)){
        $count = $data['count'];
        $idOrderInBasket = $data['id'];
    }

    if (($idProducts < 0) && ($count < 2)) {//Необходимо удалить товар из корзины.
        $t = "DELETE FROM baskets WHERE (id=%d)";
        $query = sprintf($t, mysqli_real_escape_string($connect, $idOrderInBasket));
        $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    }else{ // Иначе нужно изменить количество товара.
        if ($idProducts < 0) {
            $count--;
        } else {
            $count++;
        }
        $t = "UPDATE baskets SET count=%d WHERE id=%d";
        $query = sprintf($t, mysqli_real_escape_string($connect, $count),mysqli_real_escape_string($connect, $idOrderInBasket));
        $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    }
    $productsFromBasket = [];

    $query = "SELECT products.id as id, baskets.count as count, products.name as name, products.price as price   FROM users,baskets,products WHERE ((users.id=baskets.id_users)AND(products.id=baskets.id_product)AND(users.login='$login'))"; 
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    $countAllProducts = 0;
    while($data = mysqli_fetch_assoc($result)){
        $productsFromBasket[] = $data;
        $countAllProducts+=$data['count'];
    }

    $infoAboutBasket = ['count'=>$countAllProducts, 'text'=>1, 'all'=>$productsFromBasket];
    echo(json_encode($infoAboutBasket));
}

