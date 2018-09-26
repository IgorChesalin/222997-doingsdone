<?php

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require($name);

    $result = ob_get_clean();

    return $result;
}

function count_tasks($tasks_list, $project_name) {
  $count = 0;
  foreach ($tasks_list as $value) {
    if ($project_name === $value["TaskCategory"]) {
      $count++;
    }
  }
  return $count;
}
// предикаты
function is_task_important($task) {
  if (empty($task["TaskDeadline"])) {
      return false;
  }

  $curdate = strtotime (date('d.m.Y'));
  $taskend = strtotime (date($task["TaskDeadline"]));
  $dif = floor(($taskend - $curdate) / 3600);
  if ($dif <= 24 && $task["TaskStatus"] === false) {
    return true;
  }
  return false;
}


?>
