<?php

$errors =[];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //  if (empty($_POST["project_name"])) {
  //   $errors["project_name"] = "Не заполнено";
  // }
  if (isset($_GET["project"])) {
    !in_array($_POST["project"], array_column($projects, "id"));
    $errors["project"] = "Выберите существующий проект";
      }

  $new_project = mysqli_real_escape_string($con, $_POST["project_name"]);
  $sql = "SELECT * FROM projects WHERE title = '$new_project'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {
      $errors["project_name"] = "Такой проект уже существует";
  }

  if (!$errors) {
    $sql = "INSERT INTO projects (title, users_id) VALUES (?, ?)";
    $stmt = db_get_prepare_stmt(
      $con,
      $sql,
      [
        $_POST["project_name"],
        $_SESSION["user"]["id"]
      ]
    );
    mysqli_stmt_execute($stmt);
    header("Location: /index.php");
  }
}
