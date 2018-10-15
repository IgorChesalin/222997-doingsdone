<?php

$errors =[];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"])) {
      $errors["email"] = "Не заполнено";
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Email должен быть корректным";
    }

    if (empty($_POST["password"])) {
    $errors["password"] = "Не заполнено";
    }

    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $sql);

    $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

    if (password_verify($_POST["password"], $user["password"])) {
        $_SESSION["user"] = $user;
      }
      else {
        $errors["password"] = "Неверный пароль";
      }

    if (empty($errors)) {
    header("Location: /index.php");
    }
}
