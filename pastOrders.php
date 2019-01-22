<?php
session_start();
include("includes/header.php");
include("includes/dbconnect.php");
?>

<div class="border">
<div class="main">

<div class="pastOrders">
<?php
  if(isset($_SESSION['u_id'])) {

      $sqlO = "SELECT * FROM orders WHERE user_id='".$_SESSION['u_id']."' AND completed='Y' ORDER BY order_id DESC;";
      $resultO = mysqli_query($DBConnect, $sqlO);
      $rowO = mysqli_fetch_assoc($resultO);

      if(!$resultO == FALSE) {

        echo "<div class='orderInfo'><p>Order ID: ".$rowO['order_id']."</p>
              <p>Order Date: ".$rowO['sale_date']."</p>
              <p>Sale Total: ".$rowO['sale_total']."</p>
              <p>Items:</p></div>";
              $sqlP = "SELECT * FROM cart_items WHERE order_id='" . $rowO['order_id'] . "' ORDER BY name;";
              $resultP = mysqli_query($DBConnect, $sqlP);
              while ($rowP = mysqli_fetch_assoc($resultP)) {
                  echo "<div class='displayItem'>
                    <img class='cartImage' src='images/shop/".$rowP['image']."' alt='".$rowP['image']."'/>
                    <h1>".$rowP['name']."</h1>
                    <p>Price: $".$rowP['price']."</p>
                    <p>Quantity: ".$rowP['count']."</p>
                    </div>";
                  }

          while($rowO = mysqli_fetch_assoc($resultO)) {
            echo "<div class='orderInfo'>
                  <p>Order ID: ".$rowO['order_id']."</p>
                  <p>Order Date: ".$rowO['sale_date']."</p>
                  <p>Sale Total: ".$rowO['sale_total']."</p>
                  <p>Items:</p></div>";

            $sqlP = "SELECT * FROM cart_items WHERE order_id='" . $rowO['order_id'] . "' ORDER BY name;";
            $resultP = mysqli_query($DBConnect, $sqlP);

            if (!$resultP == FALSE) {

            while ($rowP = mysqli_fetch_assoc($resultP)) {
                echo "<div class='displayItem'>
                  <img class='cartImage' src='images/shop/".$rowP['image']."' alt='".$rowP['image']."'/>
                  <h1>".$rowP['name']."</h1>
                  <p>Price: $".$rowP['price']."</p>
                  <p>Quantity: ".$rowP['count']."</p>
                  </div>";
                }
            } else {
              header("Location: store.php?cart=error");
            }
       }
    } else {
      header("Location: store.php?cart=none");
    }
  } else {
    header("Location: login.php");
  }
?>
</div>

</div>
</div>

<?php
include("includes/footer.html");
?>
