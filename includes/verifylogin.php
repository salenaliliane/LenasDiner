<?php

  session_start();

  if(isset($_POST['submit'])) {

    include 'dbconnect.php';

    //Error handlers
    //Check if inputs are empty
    if(empty($_POST['uid']) || empty($_POST['pwd'])) {
      header("Location: ../login.php?login=empty");
      exit();
    } else {
      $uid = mysqli_real_escape_string($DBConnect, $_POST['uid']);
      $pwd = mysqli_real_escape_string($DBConnect, $_POST['pwd']);

      $sql = "SELECT * FROM users WHERE user_uid='$uid';";
      $result = mysqli_query($DBConnect, $sql);
      $resultCheck = mysqli_num_rows($result);
      
      if ($resultCheck == 0) {
        header("Location: ../login.php?login=error1");
        exit();
      } else {
          if($row = mysqli_fetch_assoc($result));
          //De-hasing the password
          $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);

          if ($hashedPwdCheck == TRUE) {
            //Log in the user here
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_uid'] = $row['user_uid'];
           header("Location: ../login.php?login=success");
           
            exit();
          } else {
           header("Location: ../login.php?login=pwderror");
           exit();
        }
      }
    }

  } else {
    header("Location: ../login.php?login=error");
    exit();
  }

 ?>
