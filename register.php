<?php
  session_start();
?>
<?php include("includes/header.php"); ?>

<div class="border">
<div class="main">

      <div class="rerrors">
      <?php
        $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if($host == 'lenasdiner.net/register.php?register=empty') {
          echo "*All feilds are required";
        } elseif ($host == 'lenasdiner.net/register.php?register=name') {
          echo "*Name can only contain letters";
        }  elseif ($host == 'lenasdiner.net/register.php?register=email') {
          echo "*Invalid email address";
        }  elseif ($host == 'lenasdiner.net/register.php?register=uid') {
          echo "*Username already in use";
        }
      ?>
    </div>

      <form class="register" action="includes/newuser.php" method="POST">
        <fieldset id="register">
        <legend>Create Account</legend>
        <label>First Name </label>
        <input type="text" name="first" />
        <label>Last Name </label>
        <input type="text" name="last" />
        <label>Email </label>
        <input type="text" name="email" />
        <label>Username </label>
        <input type="text" name="uid" />
        <label>Password </label>
        <input type="password" name="pwd" />
        <input type="submit" name="submit" value="Submit" />
        <p><a href="login.php">Login</a></p>
        </fieldset>
      </form>
      
</div>
</div>

<?php include("includes/footer.html"); ?>
