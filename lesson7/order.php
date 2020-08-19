<?php

$tpl = file_get_contents('order.tpl');
require_once("config.php");

session_start();

if ($_SESSION['login']) {
    $table = "<table class='table'><tr>
                <th>№ п/п</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Сумма</th>
                </tr>";
    $login = $_SESSION['login'];
    $query =    "SELECT products.path as path, products.id as id, baskets.count as count, products.name as name, products.price as price  
                FROM users,baskets,products WHERE ((users.id=baskets.id_users)AND(products.id=baskets.id_product)
                AND(users.login='$login'))"; 
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    $countAllProducts = 0;
    $summAllProducts = 0;
    $count = 1;
    while($data = mysqli_fetch_assoc($result)){

        $table .="<tr align='center'>
                <td>".$count++."</td>
                <td align='left'>&nbsp;&nbsp;<img width='100' heigth='66' src='".$data['path']."'>&nbsp;&nbsp;".$data['name']."</td>
                <td>".$data['count']."</td>
                <td>".$data['price']."</td>
                <td>".((int)$data['count'] * (int)$data['price'])."</td>
                </tr>";

        //$productsFromBasket[] = $data;
        $countAllProducts += $data['count'];
        $summAllProducts += ((int)$data['count'] * (int)$data['price']);
    }
    //$infoAboutBasket = ['count'=>$countAllProducts, 'text'=>1, 'all'=>$productsFromBasket];
    //$valueForBasket = json_encode($infoAboutBasket);
    $table .="<tr align='center'>
            <td colspan='3'>ИТОГО:</td>
            <td><b>$countAllProducts</b></td>
            <td><b>$summAllProducts</b></td>
            </tr>";
    $table .="</table><br>
                <form action='order2.php' method='POST'>
                Дополнительный комментарий к заказу (при необходимости):<br><textarea name='text' cols='50' rows='15'>
                </textarea><br>
                Номер телефона для обратной связи (по желанию):<br>
                <input type='text' name='phone'>
                <br>
                <input type='submit' value='Сделать заказ'>
                </form><br>
                <form action='clear_basket.php' method='POST'>
                <input type='submit' value='Очистить корзину'>
                </form>

    ";
}else{
    $table = "Вы не авторизованы на сайте.";
}



$patterns = ['/{table}/'];
$replace = [$table];
echo preg_replace($patterns, $replace, $tpl);
