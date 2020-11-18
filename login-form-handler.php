<?php
    // connect to db
    $conn = mysqli_connect('database-1-4620.c9fxeyiderap.us-east-1.rds.amazonaws.com','admin','database','' ) or die('Error connecting to MySQL server.');
    if ($conn) {
      echo "DB connected";
    }
    else {
      echo "still messed up";
    }

    // validate user info
    $emailaddr = $_POST['login_email'];
    $password = $_POST['login_password'];


?>
