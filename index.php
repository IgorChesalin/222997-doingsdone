<?php

// соединяемся с бд
$con = mysqli_connect("localhost", "root", "", "222997-doingsdone");
  if ($con == fasle) {
    print ("Ошибка подключения: " . mysqli_connect_error());
  }
  else {
    print("Соединение установлено");
  }

// устанавливаем кодировку
mysqli_set_charset($con, "utf8");

// добавляем нового пользователя
// $sql = "INSERT INTO users SET email = 'test@php.net', password = 'test'";
// $result = mysqli_query($con, $sql); // получаем объект результата
//   if (!$result) {
// $error = mysqli_error($con);
//   print("Ошибка MySQL: " . $error);
// }

// Возвращает идентификатор последней добавленной записи
// if ($result) {
// $last_id = mysqli_insert_id($con);
// }

$sql = "SELECT id, title FROM projects";
$res = mysqli_query($con, $sql);
$projects = mysqli_fetch_all($res, MYSQLI_ASSOC);
// var_dump($rows);

// подключает функции и базу
require('functions.php');
// require('data.php');

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
