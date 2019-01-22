<?php

include("dbconnect.php");

if(isset($_POST['submit'])) {

  $order = stripslashes($_POST['order']);
  $pid = stripslashes($_POST['pid']);

  $sql = "DELETE FROM cart_items WHERE order_id='$order' AND product_id='$pid';";
  $result = mysqli_query($DBConnect, $sql);

  if($result == FALSE) {
    header("Location: ../cart.php?remove=error");
  } else {
      
      $sql = "SELECT * FROM cart_items WHERE order_id='$order';";
      $result = mysqli_query($DBConnect, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck == 0) {
          header("Location: ../cart.php?cart=none");
      } else {
        header("Location: ../cart.php?remove=success");
      }
  }

} else {
  header("Location: ../cart.php");
}

 ?>
