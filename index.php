<?php

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

// подключает функции и базу
require('mysql_helper.php');
require('functions.php');
require('data.php');



// получаем контент с помощью функции шаблонизатора
if (http_response_code() === 404) {
  $content = include_template('404.php', []);
}
  else {
    $content = include_template('index.php', [
      // название переменной в шаблоне => значение переменной
      'show_complete_tasks' => $show_complete_tasks,
      'tasks' => $tasks
    ]);
  }

// присваиваем тайтл
$title = "Дела в порядке";

// помещаем контент и данные массивов в лейаут
$layout = include_template('layout.php', [
  'content' => $content,
  'title' => $title,
  'projects' => $projects,
  'tasks' => $all_tasks
]);

// выводим лейаут
print($layout);

?>
