<?php
  session_start();

  if (isset($_SESSION['user'])) {
    header('Location: profile.php');
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <title>Register</title>
</head>
<body>
  <form>

    <label for="">login</label>
    <input type="text" name="login" placeholder="login..">

    <label for="">password</label>
    <input type="password" name="password" placeholder="password..">
    
    <label for="">confirm password</label>
    <input type="password" name="confirm_password" placeholder="confirm password..">
    
    <label for="">email</label>
    <input type="email" name="email" placeholder="email..">
    
    <label for="">name</label>
    <input type="text" name="name" placeholder="name..">

    <button class="reg-btn" type="submit">Sign up</button>

    <a href="/">sign in</a>
    
    <p class="login-warning hidden"></p>
    <p class="password-warning hidden"></p>
    <p class="confirm-password-warning hidden"></p>
    <p class="email-warning hidden"></p>
    <p class="name-warning hidden"></p>

  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>