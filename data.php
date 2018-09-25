<?php
// показывать или нет TaskStatusные задачи тест
$show_complete_tasks = rand(0, 1);

// массив проектов (название проекта)
$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

// массив задач список задач в виде массива
$tasks = [
  [
        "TaskTopic" => "Собеседование в IT компании",
        "TaskDate" => "01.12.2018",
        "TaskCategory" => "Работа",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Выполнить тестовое задание",
        "TaskDate" => "25.12.2018",
        "TaskCategory" => "Работа",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Сделать задание первого раздела",
        "TaskDate" => "21.12.2018",
        "TaskCategory" => "Учеба",
        "TaskStatus" => true
  ],
  [
        "TaskTopic" => "Встреча с другом",
        "TaskDate" => "22.12.2018",
        "TaskCategory" => "Входящие",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Купить корм для кота",
        "TaskDate" => null,
        "TaskCategory" => "Домашние дела",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Заказать пиццу",
        "TaskDate" => null,
        "TaskCategory" => "Домашние дела",
        "TaskStatus" => false
  ]
];
?>
