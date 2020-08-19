<?php
require_once("config.php");
require_once("admin/function.php");
require_once("function.php");
session_start();

$login = $_SESSION['login'];
$pass = $_SESSION['pass'];
$text = $_POST['text'];
$phone = $_POST['phone'];

$pass_query = encrypt($pass);
$t = "SELECT * FROM users WHERE (login='%s' AND pass='%s')"; 
$query = sprintf($t, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $pass_query));
$result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
while($data = mysqli_fetch_assoc($result)){
    $idUsers = $data['id'];
}

if (mysqli_num_rows($result) == 1) { // Если есть такой пользователь, то переносим заказ из корзины в заказы.
    $val = time();
    $t = "INSERT INTO orders (id_users,comment, time, phone) VALUES (%d, '%s', %d, '%s')"; 
    $query = sprintf($t, mysqli_real_escape_string($connect, $idUsers), mysqli_real_escape_string($connect, $text),
            mysqli_real_escape_string($connect, $val), mysqli_real_escape_string($connect, $phone));
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

    $idOrder = mysqli_insert_id($connect);

    $t = "SELECT * FROM baskets WHERE (id_users=%d)"; 
    $query = sprintf($t, mysqli_real_escape_string($connect, $idUsers));
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

    $textForMultiQuery = '';
    $flag = 0;
    while($data = mysqli_fetch_assoc($result)){
        if ($flag == 1)  $textForMultiQuery .= ";";
        $textForMultiQuery .= "INSERT INTO position_of_orders(id_order,id_product,count) VALUES($idOrder, "
        .$data['id_product'].",".$data['count'].")";
        $flag = 1;
    }
    mysqli_multi_query($connect, $textForMultiQuery);

    mysqli_close($connect);
    $connect = mysqli_connect(SERVER, USER, PASS, DB) or die("Error of connect.");

    //$result = mysqli_store_result($connect);
    $row = mysqli_fetch_row($result);
    //$result = mysqli_multi_query($connect, $textForMultiQuery) or die ("Error: ". mysqli_error($connect));
    //mysqli_stmt_free_result($result);
    //$row = mysql_fetch_assoc($result);
    //mysqli_free_result($result);
    //echo($textForMultiQuery);

    $query = "DELETE FROM baskets WHERE id_users=$idUsers";
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));

    echo("Ваш заказ принят в обработку. В ближайшее время с Вами свяжется наш менеджер.");
    
}