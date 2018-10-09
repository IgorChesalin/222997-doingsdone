<?php

$_GET["project"] = "project";
if (isset($_GET["project"])) {
  $project = (int)$_GET["project"];
}
  else {
    $project = "#";
    echo "error";
  }

// соединяемся с бд
$con = mysqli_connect("localhost", "root", "", "222997-doingsdone");
  if ($con === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
  }

// устанавливаем кодировку
mysqli_set_charset($con, "utf8");

// подключает функции и базу
require('functions.php');
require('data.php');



// получаем контент с помощью функции шаблонизатора
$content = include_template('index.php', [
  // название переменной в шаблоне => значение переменной
  'show_complete_tasks' => $show_complete_tasks,
  'tasks' => $tasks
]);
// присваиваем тайтл
$title = "Дела в порядке";

// помещаем контент и данные массивов в лейаут
$layout = include_template('layout.php', [
  'content' => $content,
  'title' => $title,
  'projects' => $projects,
  'tasks' => $tasks
]);

// выводим лейаут
print($layout);

?>
