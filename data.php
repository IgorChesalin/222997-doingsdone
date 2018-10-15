<?php
// показывать или нет TaskStatusные задачи тест
$show_complete_tasks = rand(0, 1);
$user = ["id" => 1, "name" => "Константин"]; //  подставляем в запросах user[name] или user[id]  -- это наша глобальная переменная


// массив проектов (название проекта)
$projects = [];
$sql = "SELECT * FROM projects WHERE  users_id = ?";
$stmt = db_get_prepare_stmt($con, $sql, [$_SESSION["user"]["id"]] ?? 0);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$projects = mysqli_fetch_all($res, MYSQLI_ASSOC);

if ($selected_project !== null) {
    $is_project_exists = false;
    foreach ($projects as $value) {
      if ($value["id"] === $selected_project) {
      $is_project_exists = true;
      }
    }
    if ($is_project_exists === false) {
      http_response_code(404);
    }
}

// переменная для подсчета общего количества задач
$all_tasks = [];
$sql = "SELECT * FROM tasks WHERE users_id = ?";
$stmt = db_get_prepare_stmt($con, $sql, [$_SESSION["user"]["id"]] ?? 0);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$all_tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);

// массив задач список задач в виде массива
$tasks = [];
if (is_null($selected_project)) {
  $tasks = $all_tasks;
}
    else {
      $sql = "SELECT * FROM tasks WHERE projects_id = ? AND users_id = ?";
      $stmt = db_get_prepare_stmt($con, $sql, [$selected_project, $_SESSION["user"]["id"]] ?? 0);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
