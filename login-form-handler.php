<?php
    // connect to db
    $conn = mysqli_connect('database-1-4620.c9fxeyiderap.us-east-1.rds.amazonaws.com','admin','database','' ) or die('Error connecting to MySQL server.');

    // select database
    mysqli_select_db($conn, "librarymanagementsystem");

    // validate user info
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql_query = "SELECT password FROM Users WHERE email='$email';";
    $result = mysqli_query($conn, $sql_query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
          header("Location: ../home.php");
          exit();
        }
        else {
          header("Location: ../login.php?wrong_password");
          exit();
        }
      }
    }
    else {
      // User doesn't exit in databse
      header("Location: ../login.php?no_user");
      exit();
    }
?>
