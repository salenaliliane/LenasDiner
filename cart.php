<?php
session_start();
include("includes/header.php");
include("includes/dbconnect.php");
?>

<div class="border">
<div class="main">

<div class="cart">
<?php
  if(isset($_SESSION['u_id'])) {

      $sql = "SELECT order_id FROM orders WHERE user_id='".$_SESSION['u_id']."' AND completed='N';";
      $result = mysqli_query($DBConnect, $sql);
      $queryResults = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      $order = $row['order_id'];

      if($queryResults > 0) {

        $sql = "SELECT * FROM cart_items WHERE order_id='" . $row['order_id'] . "' ORDER BY name;";
        $result = mysqli_query($DBConnect, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
          $price = "0";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='displayItem'>
              <img class='cartImage' src='images/shop/".$row['image']."' alt='".$row['image']."'/>
              <h1>".$row['name']."</h1>
              <p>Price: $".$row['price']."</p>
              <p>Quantity: ".$row['count']."</p>
              <form class='remove' action='includes/removeItem.php' method='POST'>
                <input type='hidden' name='pid' value='".$row['product_id']."'/>
                <input type='hidden' name='order' value='".$row['order_id']."'/>
                <input type='submit' name='submit' value='Remove'/>
              </form></div>";
              $price += $row['count'] * $row['price'];
            }
            $tax = .074 * $price;
            $total = $price + $tax;
            echo "<div id='totals'>
              <p>Price: $".round($price, 2)."</p>
              <p>Tax: $".round($tax, 2)."</p>
              <p>Total: $".round($total, 2)."</p>
              <form class='complete' action='includes/completeOrder.php' method='POST'>
                <input type='hidden' name='price' value='".round($price, 2)."'/>
                <input type='hidden' name='tax' value='".round($tax, 2)."'/>
                <input type='hidden' name='total' value='".round($total, 2)."'/>
                <input type='hidden' name='order' value='".$order."'/>
                <input type='submit' name='btncart' value='Check Out'/>
              </form></div>";
       } else {
         echo "<p>No items in cart</p>
            <a href='store.php'><p>Back to Store</p></a>";
       }
    } else {
      echo "<p>No items in cart</p>
            <a href='store.php'><p>Back to Store</p></a>";
    }
  } else {
    echo "please <a href='login.php'>log in</a> to view cart";
  }
?>
</div>

</div>
</div>

<?php
include("includes/footer.html");
?>
