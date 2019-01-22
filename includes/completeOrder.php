<?php

include('dbconnect.php');

if(isset($_POST['btncart'])) {

    $price = stripslashes($_POST['price']);
    $tax = stripslashes($_POST['tax']);
    $total = stripslashes($_POST['total']);
    $order = stripslashes($_POST['order']);
    $date = date("Y-m-d");

    $sql = "UPDATE orders SET sale_date='$date', price_total='$price', tax='$tax',
      sale_total='$total', completed='Y' WHERE order_id='$order';";
    $result = mysqli_query($DBConnect, $sql);

    if($result == FALSE) {
      header("Location: ../cart.php?order=fail");
    } else {
      header("Location: ../pastOrders.php");
    }


} else {
  header("Location: ../cart.php");
}

 ?>
