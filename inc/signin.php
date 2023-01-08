<?php

  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $password = $_POST['password'];

  $error_fields = [];

  $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
  if (mysqli_num_rows($check_login) > 0) {
    $response = [
      "status" => false,
      "type" => 1,
      "message" => 'incorrect login',
      "fields" => ['login']
    ];
  }

  if ($login < 6) {
    $error_fields[] = 'login';
  }

  if ($password < 6) {
    $error_fields[] = 'password';
  }

  if (!empty($error_fields)) {
    $response = [
      "status" => false,
      "type" => 1,
      "message" => 'incorrect login or password',
      "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
  }

  $salt = 'qwer';
  $password = $salt . md5($password);

  $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

  if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
      "id" => $user['id'],
      "name" => $user['name'],
      "email" => $user['email']
    ];

    $response = [
      "status" => true
    ];

    echo json_encode($response);

  } else {
    $response = [
      "status" => false,
      "message" => 'Fail auth'
    ];

    echo json_encode($response);
  }

?>