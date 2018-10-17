<?php

/**
 * Подключение шаблонов и вывод верстки
 *
 * @param string $name Имя шаблона
 * @param array $data Массив данных
 *
 * @return string Результат отрисовки страницы
 */
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

/**
 * Счетчик задач в проекте
 *
 * @param array $tasks_list  массив всех задач с данными
 * @param int $project_id Индекс проекта
 *
 * @return Количество задач в проекте
 */
function count_tasks($tasks_list, $project_id) {

  $count = 0;
  foreach ($tasks_list as $tasks) {
    if ($project_id === $tasks["projects_id"]) { //обратить внимание на имя project_name
      $count++;
    }
  }
  return $count;
}


/**
 * Выделение приоритетных задач на основании наличия дедлайна
 *
 * @param string  $task Дата дедлайна при ее наличии
 *
 * @return bool Возращаем булево значение, на этом основании выделяем приоритетные задачи
 */
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


/**
 * Форматируем отображение даты в ДД.ММ.ГГГГ
 *
 * @param string $date передаем дату
 *
 * @return string Возвращаем дату в необходимом формате
 */
function date_form($date) {
  if (empty($date)) {
      return "";
  }
  $date_stamp = strtotime ($date);
  $date = date("d.m.Y", $date_stamp);
  return $date;
}
