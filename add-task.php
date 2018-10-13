<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if (empty($_POST["title"])) {
    $errors["title"] = "Не заполнено";
  }
  if (!in_array($_POST["project"], array_column($projects, "id"))) {
    $errors["project"] = "Выберите существующий проект";
    }

  // ПРОВЕРИТЬ ДАТУ НА СООТВЕТСТВИЕ ФОРМАТУ НЕЛЬЗЯ Т.К. ОТПРАВЛЯЕТСЯ НЕ В ТОМ ВИДЕ КАК МЫ ЕГО ВИДИМ . !!!!!
  // if (!empty($_POST["date"])) {
  //   if (date_create_from_format("d.m.Y", $_POST["date"]) === false) {
  //     $errors["date"] = "Введите дату в формате ДД.ММ.ГГГГ";
  //   }
  // }

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
        1,
        $_POST["project"] ?? null,
        $_POST["date"] ?? null,
        null,
        $_POST["title"],
        $file_name ?? null
      ]
    );
    mysqli_stmt_execute($stmt);
    header("Location: /index.php");
  }
}
