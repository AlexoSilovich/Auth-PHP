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
  <title>Auth</title>
</head>
<body>
  <form>
    
    <label for="">Логин</label>
    <input type="text" name="login" placeholder="login..">

    <label for="">Пароль</label>
    <input type="password" name="password" placeholder="password..">

    <button class="signin-btn" type="submit">Sign in</button>

    <a href="/register.php">sign up</a>
    
    <p class="warning hidden">
      Fail validation
    </p>

  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>