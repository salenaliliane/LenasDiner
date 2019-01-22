<?php
  session_start();
?>
<?php include("includes/header.php");
      include("includes/dbconnect.php");
?>

<div class="border">
<div class="main">

  <div class="boxes">

    <div class="box" style= "background: url(images/food/dessert10.png)
     no-repeat center center;
     background-size: cover;" >
       <div class="hoverBox">
         <h3>Mini Cheesecakes</h3>
         <h5>These little cheesecakes are perfect for parties, potlucks, and dinner get togethers. </h5>
       </div>
    </div>

    <div class="box" style= "background: url(images/food/breakfast21.jpeg)
     no-repeat center center;
     background-size: cover;">
       <div class="hoverBox">
         <h3>Classic French Toast</h3>
         <h5>A classic breakfast that will give you the energy you need to start your day.</h5>
      </div>
   </div>

   <div class="box" style= "background: url(images/food/lunch21.jpeg)
    no-repeat center center;
    background-size: cover;">
      <div class="hoverBox">
        <h3>Very Juicy Hamburgers</h3>
        <h5>This recipe is sure to change how you eat burgers. The meat will melt in your mouth.</h5>
      </div>
    </div>
  </div>

  <div class="book-ad">
    <div class="book-ad-info">
      <img src="images/shop/book.jpg">
    </div>
    <div class="book-ad-info">
      <div class="ad-info">
        <h2>Lena's Diner Recipe Book</h2>
        <p>Purchase our book with hundreds of cooking tips and recipes!</p>
        <p>Great for beginner and advanced cooks!<p>
        <p>Includes recipes for everything seen on this website!<p>
        <h3>Only $19.99</h3>
        
                <?php
          $sql = "SELECT * FROM products WHERE item='book'";
          $result = mysqli_query($DBConnect, $sql);
          $queryResults = mysqli_num_rows($result);
      
          if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
      
              echo "
                <form class='addItem' action='includes/additem.php' method='POST'>
                  <input type='hidden' name='name' value='".$row['name']."'/>
                  <input type='hidden' name='price' value='".$row['price']."'/>
                  <input type='hidden' name='image' value='".$row['image']."'/>
                  <input type='hidden' name='pid' value='".$row['product_id']."'/>
                  <input type='hidden' name='count' value='1'/>
                  <input type='submit' name='btncart' value='Add to Cart'/>
                </form>";
            }
          }
      
      ?>
        
        <a href="register.php"><button class="btnregister">Register</button></a>
      </div>
    </div>
  </div>

 <table class="highlights">

   <tr>
     <td>
         <img src="images/food/dinner22.jpeg" alt="spaghetti">
         <h3>Chicken Parmasan Spaghetti Squash</h3>
     </td>

     <td>
         <img src="images/food/lunch11.jpeg" alt="ham">
         <h3>Ham, Cheese, and Potatos</h3>
     </td>
  </tr>

  <tr>
     <td>
         <img src="images/food/dinner30.jpg" alt="taco">
         <h3>Spicey Chicken Tacos</h3>
    </td>

    <td>
        <img src="images/food/dinner12.jpeg" alt="steak">
        <h3>Perfectly Cooked, Steak and Potatos</h3>
    </td>
  </tr>
</table>

</div>
 </div>

<?php include("includes/footer.html"); ?>
