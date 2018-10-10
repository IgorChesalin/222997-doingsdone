<?php
// показывать или нет TaskStatusные задачи тест
$show_complete_tasks = rand(0, 1);
$user = ["id" => 1, "name" => "Константин"]; //  подставляем в запросах user[name] или user[id]  -- это наша глобальная переменная



// массив проектов (название проекта)
$sql = "SELECT id, title FROM projects";
$res = mysqli_query($con, $sql);
  if($res !== false) {
$projects = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
 else {
   $projects = [];
}

$a = false;
foreach ($projects as $value) {
  if ((int)$value["id"] === $selected_project) {
  $a = true;
  }
}
if ($a === false) {
  http_response_code(404);
}

// переменная для подсчета общего количества задач
$all_tasks = [];
$sql = "SELECT * FROM tasks";
$res = mysqli_query($con, $sql);
  if($res !== false) {
    $all_tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
  }

// массив задач список задач в виде массива
$tasks = [];
if (is_null($selected_project)) {
  $tasks = $all_tasks;
}
    else {
      $sql = "SELECT * FROM tasks WHERE projects_id = $selected_project";
      $res = mysqli_query($con, $sql);
        if($res !== false) {
          $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
}
