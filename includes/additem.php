<?php

session_start();
include('dbconnect.php');

if(isset($_POST['cart']) || isset($_POST['btncart'])) {
  if(isset($_SESSION['u_id'])){

    $pid = stripslashes($_POST['pid']);
    $name = stripslashes($_POST['name']);
    $price = stripslashes($_POST['price']);
    $image = stripslashes($_POST['image']);
    $count = stripslashes($_POST['count']);

    $sql = "SELECT * FROM orders WHERE user_id='" . $_SESSION['u_id'] . "' AND completed = 'N';";
    $result = mysqli_query($DBConnect, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck == 0){
      //create order
      $sql = "INSERT INTO orders (user_id) VALUES (" . $_SESSION['u_id'] . ")";
      $result = mysqli_query($DBConnect, $sql);

      if(!$result == FALSE) {
        $sql = "SELECT * FROM orders WHERE user_id='" . $_SESSION['u_id'] . "' AND completed = 'N';";
        $result = mysqli_query($DBConnect, $sql);
        $row = mysqli_fetch_assoc($result);
        $order = $row['order_id'];
      } else {
        header("Location: ../cart.php?cart=error1");
      }
    } else {
      $row = mysqli_fetch_assoc($result);
      $order = $row['order_id'];
      $_SESSION['order'] = $order;
    }

    //add item to products table
    $sql = "INSERT INTO cart_items (order_id, product_id, count,
            name, price, image) VALUES ('$order', '$pid', '$count',
            '$name', '$price', '$image');";
    $result = mysqli_query($DBConnect, $sql);

    if($result == FALSE) {
      header("Location: ../cart.php?cart=error");
    }else {
      header("Location: ../cart.php?cart=success");
    }
  } else {
    header("Location: ../login.php?login=none");
  }

}else
  header("Location: ../cart.php?cart=none")

?>
