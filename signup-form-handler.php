<?php
  $conn = mysqli_connect('database-1-4620.c9fxeyiderap.us-east-1.rds.amazonaws.com','admin','database','' ) or die('Error connecting to MySQL server.');

  // select database
  mysqli_select_db($conn, "librarymanagementsystem");

  // user information entered in form
  $email = $_POST['signup_email'];
  $password = $_POST['signup_password'];
  $confirm_password = $_POST['signup_confirm_password'];

  // validate user input
  if (empty($email) || empty($password) || empty($confirm_password)) {
    header("Location: ../login.php?signup=empty");
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../login.php?signup=email");
      exit();
  }

  // check if entered passwords match
  if ($confirm_password !== $password) {
    header("Location: ../login.php?confirmpassword=wrong");
    exit();
  }

  // check if database already has email in it
  $sql_query = "SELECT email FROM Users WHERE email='$email';";
  $result = mysqli_query($conn, $sql_query);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    // user already in the database
    while ($row = mysqli_fetch_assoc($result)) {
      header("Location: ../login.php?user_already_exists");
      exit();
    }
  }
  else {
    // generate hashed password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // insert user info into database
    $sql_query2 = "INSERT INTO Users (password, email) VALUES ('$hashed_password', '$email');";
    $result2 = mysqli_query($conn, $sql_query2);
    if ($result2) {
      // query is good so direct to home page
      header("Location: ../home.php");
      exit();
    }
    else {
      // redirect to login if everything failed
      printf("Error is %s.\n", mysqli_error($conn));
      echo "<p>Can't enter user into database. Check code!</p>";
    }
  }

?>
