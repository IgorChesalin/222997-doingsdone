<?php

function include_template($name, $data) {
    $name = 'templates/' . $name; // путь к шаблону
    $result = ''; //будем возвращать пустую строку, независимо от данных/шаблонов

    if (!file_exists($name)) { //проверяем существует ли файл
        return $result;//если не сущетсвует возвращаем результат
    }

    ob_start(); // все, что должно быть отрисовано ниже - попадет в спец буфер
    extract($data); // ключ массива => в значение в название переменной
    require($name); // подключаем наш шаблон (=перенесли наш код в эту функцию), не выводим, а помещаем в буфер

    $result = ob_get_clean(); // забираем содержимое буфера и помещаем в переменную резалт

    return $result; // возвращаем результат отрисовки шаблона
}

function count_tasks($tasks_list, $project_name) {
  $count = 0;
  foreach ($tasks_list as $value) {
    if ($project_name === $value["TaskCategory"]) { //обратить внимание на имя project_name ["TaskCategory"]
      $count++;
    }
  }
  return $count;
}
// предикаты
function is_task_important($task) {
  if (empty($task["TaskDeadline"])) {//deadline будет переименован
      return false;
  }

  $curdate = strtotime (date('d.m.Y'));
  $taskend = strtotime (date($task["TaskDeadline"])); //deadline будет переименован
  $dif = floor(($taskend - $curdate) / 3600);
  if ($dif <= 24 && $task["TaskStatus"] === false) { // условие делаем на empty дата закрытия задачи
    return true;
  }
  return false;
}


?>
