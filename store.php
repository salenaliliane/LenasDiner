<?php
  session_start();
  include("includes/header.php");
  include("includes/dbconnect.php");

?>

<div class="border">
<div class="main">

<form class="filter" action="filter.php" method="POST">
  <fieldset>
    <legend>Filter Shop Items</legend>
    <label for="item">Item:</label>
    <select name="item" id="item">
      <option value="any">Any</option>
      <option value="cover">Cover</option>
      <option value="crockpot">Crockpot</option>
      <option value="kettle">Kettle</option>
      <option value="ladel">Ladel</option>
      <option value="plate">Plate</option>
      <option value="pot">Pot</option>
    </select>
    <label for="color">Color:</label>
    <select name="color" id="color">
      <option value="any">Any</option>
      <option value="purple">Purple</option>
      <option value="yellow">Yellow</option>
      <option value="green">Green</option>
      <option value="blue">Blue</option>
      <option value="pink">Pink</option>
      <option value="orange">Orange</option>
    </select>
    <input type="submit" name="submit" value="Submit" />
</fieldset>
</form>

<!--<form id="cart" action="cart.php" method="POST">
    <input type="submit" name="submit" value="Cart" />
</form>-->

<div class="storecolumns">
  <?php
    $sql = "SELECT * FROM products ORDER BY rand()";
    $result = mysqli_query($DBConnect, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['item']!= "book"){
        echo "<div class='displayPost'>
          <img class='displayImage' src='images/shop/".$row['image']."' alt='".$row['color'].", ".$row['item']."'/>
          <h1>".$row['name']."</h1>
          <p>$".$row['price']."</p>
          <form class='addItem' action='includes/additem.php' method='POST'>
            <input type='hidden' name='name' value='".$row['name']."'/>
            <input type='hidden' name='price' value='".$row['price']."'/>
            <input type='hidden' name='image' value='".$row['image']."'/>
            <input type='hidden' name='pid' value='".$row['product_id']."'/>
            <label>Quantity</label>
            <input type='text' name='count' value='1' />
            <input type='submit' name='cart' value='Add to Cart'/>
          </form>
        </div>";
        }
      }
    }

?>

</div>

</div>
</div>
<?php include("includes/footer.html"); ?>
 
