<?php
  session_start();
?>
<?php include("includes/header.php"); ?>

<div class="border">
<div class="main">

<div class="rerrors">
<?php
  $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if($host == 'localhost/Lena\'s%20Diner/userinfo.php?edit=empty') {
    echo "*All feilds are required";
  } elseif ($host == 'localhost/Lena\'s%20Diner/userinfo.php?edit=name') {
    echo "*Name can only contain letters";
  }  elseif ($host == 'localhost/Lena\'s%20Diner/userinfo.php?edit=email') {
    echo "*Invalid email address";
  }  elseif ($host == 'localhost/Lena\'s%20Diner/userinfo.php?edit=uid') {
    echo "*Username already in use";
  }
?>
</div>

<form class="useredit" method="post" action="includes/useredit.php" method="POST">
  <fieldset id="register">
  <legend>Edit your information</legend>
  <label for="name">First Name </label>
  <input type="text" name="first" value=<?php echo $_SESSION['u_first'];?> /></p>
  <label for="last">Last Name </label>
  <input type="text" name="last" value=<?php echo $_SESSION['u_last'];?> /></p>
  <label for="email">Email </label>
  <input type="text" name="email" value=<?php echo $_SESSION['u_email'];?> /></p>
  <label for="uid">Username </label>
  <input type="text" name="uid" value=<?php echo $_SESSION['u_uid'];?> /></p>
  <input type="submit" name="submit" value="Submit" />
  <p><a href="login.php">Cancel</a></p>
  </fieldset>
</form>

</div>
</div>

<?php include("includes/footer.html"); ?>
