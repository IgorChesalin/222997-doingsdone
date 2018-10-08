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


function count_tasks($tasks_list, $project_id) {
  $count = 0;
  foreach ($tasks_list as $tasks) {
    if ($project_id === $tasks["projects_id"]) { //обратить внимание на имя project_name
      $count++;
    }
  }
  return $count;
}


// предикаты
function is_task_important($task) {
  if (empty($task["deadline"])) { //deadline будет переименован
      return false;
  }

  $curdate = strtotime (date('d.m.Y'));
  $taskend = strtotime (date($task["deadline"])); //deadline будет переименован
  $dif = floor(($taskend - $curdate) / 3600);
  if ($dif <= 24 && empty($task["done_date"])) { // условие делаем на empty дата закрытия задачи
    return true;
  }
  return false;
}


?>
