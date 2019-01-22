<?php

  if(isset($_POST['submit'])) {

    include_once 'dbconnect.php';

    $first = mysqli_real_escape_string($DBConnect, $_POST['first']);
    $last = mysqli_real_escape_string($DBConnect, $_POST['last']);
    $email = mysqli_real_escape_string($DBConnect, $_POST['email']);
    $uid = mysqli_real_escape_string($DBConnect, $_POST['uid']);
    $pwd = mysqli_real_escape_string($DBConnect, $_POST['pwd']);


    //Error handlers
    //Check for empty fields
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
      header("Location: ../register.php?register=empty");

      exit();
    } else {
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location: ../register.php?register=name");
        exit();
      } else {
        //Check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../register.php?register=email");
          exit();
        } else {
          $sql = "SELECT * FROM users WHERE user_uid='$uid'";
          $result = @mysqli_query($DBConnect, $sql);
          $resultCheck = @mysqli_fetch_row($result);

          if($resultCheck > 0) {
            header("Location: ../register.php?register=uid");
            exit();
          } else {
              error_reporting(0);
            //Hashing the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert the user into the database
            $sql = "INSERT INTO users (user_first, user_last, user_email,
                    user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
            $queryResult = @mysqli_query($DBConnect, $sql);
            header("Location: ../login.php?register=success");

            if($queryResult == FALSE) {
              header("Location: ../register.php?register=fail");

            }
          }
        }
      }
    }

  } else {
    header("Location: ../register.php");
    exit();
  }

 ?>
