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

?>
