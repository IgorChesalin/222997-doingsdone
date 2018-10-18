<?php

// показывать или нет TaskStatusные задачи
$show_complete_tasks = 0;
if (isset($_GET["show_completed"])) {
    $show_complete_tasks = intval($_GET["show_completed"]);
}


// массив проектов (название проекта)
$projects = [];
$sql = "SELECT * FROM projects WHERE  users_id = ?";
$stmt = db_get_prepare_stmt($con, $sql, [$_SESSION["user"]["id"] ?? 0]);
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

//проверить на существование фильтра задач, в зависимости от значения ГЕТ параметра добавлять к условию скл запроса фильтр по дедлайну
$filter = "";
if (isset($_GET["today"])) {
  $filter = " AND deadline = CURDATE()";
}

if (isset($_GET["tomorrow"])) {
  $filter = " AND deadline = ADDDATE(CURDATE(), INTERVAL 1 DAY)";
}

if (isset($_GET["overdue"])) {
  $filter = " AND deadline < CURDATE()";
}

// переменная для подсчета общего количества задач
$all_tasks = [];
$sql = "SELECT * FROM tasks WHERE users_id = ?" . $filter;
$stmt = db_get_prepare_stmt($con, $sql, [$_SESSION["user"]["id"] ?? 0]);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$all_tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);

// массив задач список задач в виде массива
$tasks = $all_tasks;
if (!is_null($selected_project)) {
    $sql = "SELECT * FROM tasks WHERE projects_id = ? AND users_id = ?" . $filter;
    $stmt = db_get_prepare_stmt($con, $sql, [$selected_project, $_SESSION["user"]["id"]] ?? 0);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
