<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"])) {
    $errors["email"] = "Не заполнено";
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email должен быть корректным";
    }
    if (empty($_POST["name"])) {
    $errors["name"] = "Введите имя";
    }
    if (empty($_POST["password"])) {
    $errors["password"] = "Введите пароль";
    }


    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $errors["email"] = "Пользователь с этим email уже зарегистрирован";
    }
    if (empty($errors)) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (email, password, name, create_date) VALUES (?, ?, ?, NOW())";
      $stmt = db_get_prepare_stmt(
        $con,
        $sql,
        [
          $_POST["email"],
          $password,
          $_POST["name"],
        ]
      );
      $res = mysqli_stmt_execute($stmt);

      $email = mysqli_real_escape_string($con, $_POST["email"]);
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $res = mysqli_query($con, $sql);
      $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;
      $_SESSION["user"] = $user;

      header("Location: /index.php");
    }
}
