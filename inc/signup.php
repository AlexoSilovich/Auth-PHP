<?php

  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_POST['email'];
  $name = $_POST['name'];

  $error_fields = [];
  $error_message = [];

  if (strlen($login) < 6) {
    $error_fields[] = 'login';
    $error_message[] = 'incorrect login';
  }
  if (strlen($password) < 6 || ctype_alpha($password) || ctype_digit($password)) {
    $error_fields[] = 'password';
    $error_message[] = 'incorrect password';
  }
  if ($confirm_password != $password || $confirm_password == '') {
    $error_fields[] = 'confirm_password';
    $error_message[] = 'incorrect confirm_password';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
    $error_message[] = 'incorrect email';
  }
  if (strlen($name) < 2 || !ctype_alpha($name)) {
    $error_fields[] = 'name';
    $error_message[] = 'incorrect name';
  }

  if (!empty($error_fields)) {
    $response = [
      "status" => false,
      "type" => 1,
      "message" => $error_message,
      "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
  }

  if ($password === $confirm_password) {
    $salt = 'qwer';
    $password = $salt . md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`) VALUES (NULL, '$login', '$password', '$email', '$name')");

    $response = [
      "status" => true,
      "message" => 'Register success',
    ];
    echo json_encode($response);

  } else {
    $response = [
      "status" => false,
      "message" => 'Password do not match',
    ];    
    echo json_encode($response);
  }

?>
