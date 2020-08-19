<?php
require_once("admin_control.php");
require_once("../config.php");

$query = "SELECT 
        orders.id as id,
        orders.comment as comment,
        orders.time as time,
        orders.status as status,
        orders.phone as phone,
        position_of_orders.id_product as id_product,
        position_of_orders.count as count,
        products.name as name,
        products.price as price,
        users.login as login,
        users.email as email
        FROM orders, position_of_orders, products,users WHERE ((orders.id = position_of_orders.id_order)AND
        (position_of_orders.id_product = products.id)AND(users.id=orders.id_users)) ORDER BY orders.id"; 
$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

$arrayOfOrders = [];

while($data = mysqli_fetch_assoc($result)){
        $idOrder = $data['id'];
        if (!$arrayOfOrders[$idOrder]) $arrayOfOrders[$idOrder] = [];

        $arrayOfOrders[$idOrder]['login'] = $data['login'];
        $arrayOfOrders[$idOrder]['phone'] = $data['phone']."";
        $arrayOfOrders[$idOrder]['email'] = $data['email'];
        $arrayOfOrders[$idOrder]['time'] = $data['time'];
        $arrayOfOrders[$idOrder]['status'] = $data['status'];
        $arrayOfOrders[$idOrder]['comment'] = $data['comment']."";
        $arrayOfOrders[$idOrder]['position'][] = [$data['name'],$data['count'],$data['price']];
}

echo("<h1>Заказы в работе.</h1>");
$table = "<table class='table'>
            <tr>
            <th>№ Заказа</th>
            <th>Заказчик</th>
            <th>Время заказа</th>
            <th>Состояние заказа</th>
            <th>Состав заказа</th>
            <th>Действия</th>
            <th width='150'>Комментарий</th>
            </tr>
            ";
        $i = 1;
foreach ($arrayOfOrders as $key=>$val)  {
        if ($val['status'] == 0) {
                $textOfStatus = "<span style='color:red'>Заказ<br>направлен<br>заказчиком.</span>";
        } elseif ($val['status'] == 1) {
                $textOfStatus = "<span style='color:blue'>Заказ<br>в<br>обработке.</span>";
        } else {
                $textOfStatus = "<span style='color:green'>Заказ<br>выполнен.</span>";
        }

        $tableOfOrders = "<table class='table'><tr><th>№ п/п</th><th>Наименование товара</th><th>Кол-во</th>
                        <th>Цена</th><th>Сумма</th></tr>";
                $sumOrder = 0;
                $numPosition = 1;
                foreach ($val['position'] as $pos)      {
                        $sumPosition = (int)$pos[1] * (int)$pos[2];
                        $sumOrder += $sumPosition;
                        $tableOfOrders .= "<tr align='center'><td>".$numPosition++."</td><td align='left'>".$pos[0]."</td><td>".$pos[1].
                                        "</td><td>".$pos[2]."</td><td>$sumPosition</td></tr>";
                }

        $tableOfOrders .= "<tr align='center'><td colspan='4'><b>ИТОГО</b></td><td><b>$sumOrder</b></td></tr>";

        $tableOfOrders .= "</table>";
        $i++;
        if ($i%2 == 0) {
                $table .= "<tr align='center' style='background-color:silver;'>";
        }else{
                $table .= "<tr align='center'>";   
        }
        $table .= "
            <td>".$key."</td>
            <td>".$val['login']."<br><a href='mailto:".$val['email']."'>".$val['email']."</a><br>".$val['phone']."</td>
            <td>".date('d F Y, g:i a', $val['time'])."</td>
            <td>$textOfStatus</td>
            <td>$tableOfOrders</td>
            <td><form action='order2.php' method='POST'><input type='hidden' name='id' value='".$key."'>
            <input type='submit' value='Удалить' name='del'>
            <br><br><input type='submit' value='В обработку' name='work'>
            <br><br><input type='submit' value='Выполнен' name='end'></form>
            </td>
            <td>".$val['comment']."</td>
            </tr>
            ";
}

$table .= "</table>";

//print_r($arrayOfOrders);
echo('<link rel="stylesheet" href="style.css">');
echo($table);