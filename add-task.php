<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if (empty($_POST["title"])) {
    $errors["title"] = "Не заполнено";
  }
  if (!empty($_POST["project"]) && !in_array($_POST["project"], array_column($projects, "id"))) {
    $errors["project"] = "Выберите существующий проект";
  }

  if (isset($_FILES["preview"])) {
    $file_name = $_FILES["preview"]["name"];
    $file_path = __DIR__ . "/";
    move_uploaded_file($_FILES["preview"]["tmp_name"], $file_path . $file_name);
  }

  if (!$errors) {
    $sql = "INSERT INTO tasks (users_id, projects_id, create_date, deadline, done_date, title, file) VALUES (?, ?, NOW(), ?, ?, ?, ?)";
    $stmt = db_get_prepare_stmt(
      $con,
      $sql,
      [
        $_SESSION["user"]["id"] ?? 0,
        !empty($_POST["project"]) ? $_POST["project"] : null,
        !empty($_POST["date"]) ? $_POST["date"] : null,
        null,
        $_POST["title"],
        !empty($file_name) ? $file_name : null
      ]
    );
    mysqli_stmt_execute($stmt);
    header("Location: /index.php");
  }
}
