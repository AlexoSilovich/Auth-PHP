<?php

  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_POST['email'];
  $name = $_POST['name'];

  $error_fields = [];
  $valid_pass = "/^[a-zа-яё\d][a-zа-яё\d\s][a-zа-яё\d]$/i";

  if (strlen($login) < 6) {
    $error_fields[] = 'login';
  }
  if (strlen($password) < 6 || preg_match($valid_pass, $password)) {
    $error_fields[] = 'password';
  }
  if ($confirm_password != $password || $confirm_password == '') {
    $error_fields[] = 'confirm_password';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
  }
  if (strlen($name) < 2) {
    $error_fields[] = 'name';
  }

  if (!empty($error_fields)) {
    $response = [
      "status" => false,
      "type" => 1,
      "message" => 'incorrect auth',
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
