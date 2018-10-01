<?php

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
