<?php

require_once("admin_control.php");
require_once("../config.php");

$idOrder = (int)$_POST['id'];
if (isset($_POST['del']))  {
    $operation = 0;
} elseif (isset($_POST['work'])) {
    $operation = 1;
} elseif (isset($_POST['end'])) {
    $operation = 2;
} else {
    header('Location: order.php');
}

if ($operation == 0) {
    $query= "DELETE FROM position_of_orders WHERE id_order=$idOrder;
             DELETE FROM orders WHERE id=$idOrder";
    mysqli_multi_query($connect, $query);
    header('Location: order.php');
}else{
    $query= "UPDATE orders SET status=$operation WHERE id=$idOrder";
    $result = mysqli_query($connect, $query) or die ("Error: ". mysqli_error($connect));
    header('Location: order.php');
}
