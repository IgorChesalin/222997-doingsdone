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

// массив задач список задач в виде массива
 $sql = "SELECT * FROM tasks";
 $res = mysqli_query($con, $sql);
   if($res !== false) {
 $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
 }
  else {
    $tasks = [];
}
