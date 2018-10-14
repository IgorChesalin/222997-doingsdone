<?php

session_start();


if (empty($_SESSION["user"]) && !isset($_GET["guest"]) && !isset($_GET["reg"]) && !isset($_GET["auth"])) {
  header("Location: /index.php?guest");
}


//проверка на существование
$selected_project = null;
if (isset($_GET["project"])) {
  $selected_project = (int)$_GET["project"];
}


// соединяемся с бд
$con = mysqli_connect("localhost", "root", "", "222997-doingsdone");
  if ($con === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
  }

// устанавливаем кодировку
mysqli_set_charset($con, "utf8");

// подключает функции и базу // поправить
require('mysql_helper.php');
require('functions.php');
require('data.php');

$errors = [];

$template = "index.php";
if (isset($_GET["add-task"])) {
  $template = "add-task.php";
  require "add-task.php";
}

$layout_template = "layout.php";
if (isset($_GET["reg"]) && empty($_SESSION["user"])) {
  $layout_template = "enter_layout.php";
  $template = "register.php";
  require "reg.php";
}

if (isset($_GET["auth"]) && empty($_SESSION["user"])) {
  $layout_template = "enter_layout.php"; // переименовать
  $template = "auth.php";
  require "auth.php";
}

if (isset($_GET["guest"]) && empty($_SESSION["user"])) {
  $layout_template = "guest_layout.php";
  $template = "guest.php";
}

// получаем контент с помощью функции шаблонизатора
if (http_response_code() === 404) {
  $content = include_template('404.php', []);
}
  else {
    $content = include_template($template, [
      // название переменной в шаблоне => значение переменной
      'show_complete_tasks' => $show_complete_tasks,
      'tasks' => $tasks,
      'projects' => $projects,
      'errors' => $errors
    ]);
  }


// присваиваем тайтл
$title = "Дела в порядке";

// помещаем контент и данные массивов в лейаут

$layout = include_template($layout_template, [
  'content' => $content,
  'title' => $title,
  'projects' => $projects,
  'tasks' => $all_tasks
]);

// выводим лейаут

print($layout);


?>
