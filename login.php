<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Unique CSS  -->
  <link href="unique-css.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">


  <title>Library Management System</title>
</head>

<body>
  <div class="form">
    <div class="head" class="signup">
      <div onclick="swap(this);" data-tab="login" class="login-tab">
        LOGIN
      </div>
      <div onclick="swap(this);" data-tab="signup" class="signup-tab">
        SIGNUP
      </div>
    </div>
    <div class="body" id="form-body">
      <div class="login">
        <form class="form-row" action="login-form-handler.php" method="POST">
          <input type="email" name="login_email" placeholder="EMAIL@GMAIL.COM" required>
          <input type="password" name="login_password" placeholder="PASSWORD" required>
          <button>LOGIN TO ACCOUNT</button>
        </form>
        <?php

        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "Invalid_login") == true) {
          echo "<p class='error'>Login information is incorrect!</p>";
        }
        elseif (strpos($fullUrl, "wrong_password") == true) {
          echo "<p class='error'>Incorrect password!</p>";
        }
        elseif (strpos($fullUrl, "no_user") == true) {
          echo "<p class='error'>User doesn't exist. Create an account!</p>";
        }
        ?>
      </div>
      <div class="signup">
        <form class="form-row" action="signup-form-handler.php" method="POST">
          <input type="email" name="signup_email" placeholder="EMAIL@GMAIL.COM" required>
          <input type="Password" name="signup_password" placeholder="PASSWORD" required>
          <input type="Password" name="signup_confirm_password" placeholder="CONFIRM PASSWORD" required>
          <button>CREATE ACCOUNT</button>
        </form>
        <?php
        $fullUrl2 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl2, "signup=empty") == true) {
          echo "<p class='error'>You did not fill in all fields!</p>";
        }
        elseif (strpos($fullUrl2, "signup=email") == true) {
          echo "<p class='error'>Your email is not valid!</p>";
        }
        elseif (strpos($fullUrl2, "confirmpassword=wrong") == true) {
          echo "<p class='error'>Passwords don't match!</p>";
        }
        elseif (strpos($fullUrl2, "user_already_exists") == true) {
          echo "<p class='error'>User already has an account!</p>";
        }
        elseif (strpos($fullUrl2, "invalid_password") == true) {
          echo "<p class='error'>Password needs at least 1 capital letter!</p>";
        }

        ?>
      </div>
    </div>
  </div>
  <script>
    function swap(referTo) {
      if (referTo.getAttribute("data-tab") == "login") {
        document.getElementById("form-body").classList.remove('active');
        referTo.parentNode.classList.remove('signup');
      }
      else {
        document.getElementById("form-body").classList.add('active');
        referTo.parentNode.classList.add('signup');
      }
    }
  </script>

</body>
</html>
