<?php

session_start();

  if(isset($_POST['submit'])) {

    include_once 'dbconnect.php';

    $new_first = stripslashes($_POST['first']);
    $new_last = stripslashes($_POST['last']);
    $new_email = stripslashes($_POST['email']);
    $new_uid = stripslashes($_POST['uid']);

    $u_id = $_SESSION['u_id'];
    $current_uid = $_SESSION['u_uid'];

    //Error handlers
    //Check for empty fields
    if(empty($new_first) || empty($new_last) || empty($new_email) || empty($new_uid)) {
      header("Location: ../userinfo.php?edit=empty");
      exit();
    } else {
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z]*$/", $new_first) || !preg_match("/^[a-zA-Z]*$/", $new_last)){
        header("Location: ../userinfo.php?edit=name");
        exit();
      } else {
        //Check if email is valid
        if(!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../userinfo.php?edit=email");
          exit();
        } else {
          $sql = "SELECT * FROM users WHERE user_id='$u_id'";
          $result = mysqli_query($DBConnect, $sql);
          $resultCheck = mysqli_fetch_row($result);

          if(!$current_uid && $resultCheck > 0) {
            header("Location: ../userinfo.php?edit=uid");
            exit();
          } else {

            //Edit user information into database
              $sql = "UPDATE users SET
                    user_first = '$new_first',
                    user_last = '$new_last',
                    user_email = '$new_email',
                    user_uid = '$new_uid'
                    WHERE user_id = '$u_id';";
              $queryResult = mysqli_query($DBConnect, $sql);

              if($queryResult == FALSE) {
                header("Location: ../userinfo.php?edit=fail");
              } else {
                $sql = "SELECT user_id, user_first, user_last, user_email, user_uid FROM users WHERE user_uid='$new_uid'";
                $result = mysqli_query($DBConnect, $sql);
                $row = mysqli_fetch_assoc($result);

                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_first'];
                $_SESSION['u_last'] = $row['user_last'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_uid'] = $row['user_uid'];
                header("Location: ../login.php?edit=success");
                exit();
              }
            }
          }
        }
      }
  } else {
    header("Location: ../login.php?");
    exit();
  }

 ?>
