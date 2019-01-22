<?php
  session_start();
?>
<?php include("includes/header.php"); ?>

<div class="border">
<div class="main">

    <?php
      $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

      if(isset($_SESSION['u_uid'])) {
        if($host == 'lenasdiner.net/login.php?login=success') {
            echo "<div class='greetings'>";
            echo "Welcome Back " . $_SESSION['u_uid'] . "!";
            echo "</div>";
        }
        echo '<form class="logout" action="includes/logout.php" method="POST">
              <fieldset id="logout">
                <table>
                  <tr>
                    <th colspan="2">User Information</th>
                  </tr><tr>
                    <td>First Name:</td>
                    <td>' . $_SESSION['u_first'] . '</td>
                  </tr><tr>
                    <td>Last Name:</td>
                    <td>' . $_SESSION['u_last'] . '</td>
                  </tr><tr>
                    <td>Email:</td>
                    <td>' . $_SESSION['u_email'] . '</td>
                  </tr><tr>
                    <td>Username:</td>
                    <td>' . $_SESSION['u_uid'] . '</td>
                  </tr>
                </table>
                  <button type="submit" name="submit">Logout</button>
                  <p><a href="userinfo.php">Edit Profile</a></p>
                  <p><a href="pastOrders.php">Past Orders</a></p>
              </fieldset>
              </form>';
      } else {

        if($host == 'lenasdiner.net/login.php?register=success') {
        error_reporting(E_ALL ^ E_NOTICE);
          echo "<div class='greetings'>";
          echo "*Registration successful" . $_SESSION['u_id'] . "! ";
          echo "Please log in";
          echo "</div>";
        } elseif($host == 'lenasdiner.net/login.php?login=empty') {
            echo "<div class='lerrors'>";
            echo "*All feilds are required";
            echo "</div>";
        } elseif ($host == 'lenasdiner.net/login.php?login=error1') {
            echo "<div class='lerrors'>";
            echo "*Username doesn't exist";
            echo "</div>";
        } elseif ($host == 'lenasdiner.net/login.php?login=pwderror') {
            echo "<div class='lerrors'>";
            echo "*Invalid password";
            echo "</div>";
        }

        echo '<form class="login" action="includes/verifylogin.php" method="POST">
              <fieldset id="login">
              <legend>Login</legend>
              <label for="uid">Username </label>
              <input type="text" name="uid" id="uid" />
              <label for="pwd">Password </label>
              <input type="password" name="pwd" id="pwd" />
              <input type="submit" name="submit" value="Submit" />
              <p><a href="register.php">Register</a></p>
              </fieldset>
              </form>';
      }
    ?>

</div>
</div>

<?php include("includes/footer.html"); ?>
