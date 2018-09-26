<?php
// показывать или нет TaskStatusные задачи тест
$show_complete_tasks = rand(0, 1);

// массив проектов (название проекта)
$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

// массив задач список задач в виде массива
$tasks = [
  [
        "TaskTopic" => "Собеседование в IT компании",
        "TaskDeadline" => "01.12.2018",
        "TaskCategory" => "Работа",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Выполнить тестовое задание",
        "TaskDeadline" => "25.09.2018",
        "TaskCategory" => "Работа",
        "TaskStatus" => true
  ],
  [
        "TaskTopic" => "Сделать задание первого раздела",
        "TaskDeadline" => "26.09.2018",
        "TaskCategory" => "Учеба",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Встреча с другом",
        "TaskDeadline" => "22.12.2018",
        "TaskCategory" => "Входящие",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Купить корм для кота",
        "TaskDeadline" => null,
        "TaskCategory" => "Домашние дела",
        "TaskStatus" => false
  ],
  [
        "TaskTopic" => "Заказать пиццу",
        "TaskDeadline" => null,
        "TaskCategory" => "Домашние дела",
        "TaskStatus" => false
  ]
];
?>
