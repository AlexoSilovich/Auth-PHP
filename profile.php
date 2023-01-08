<?php
  session_start();

  if (!$_SESSION['user']) {
    header('Location: /');
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
  <div>
    <?= 'Hello ' . $_SESSION['user']['name'] . '!' ?>
  </div>
  <a href="inc/logout.php">Exit</a>
</body>
</html>