<?php

if (isset($_GET["task_id"])) {
  $sql = "SELECT * FROM tasks WHERE users_id = ? AND id = ?";
  $stmt = db_get_prepare_stmt($con, $sql, [$_SESSION["user"]["id"] ?? 0, $_GET["task_id"] ?? 0]);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $task = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if (!empty($task)) {
      if (!empty($task[0]["done_date"])) {
        $sql = "UPDATE tasks SET done_date = null WHERE id = ?;";
      }
      else {
        $sql = "UPDATE tasks SET done_date = NOW() WHERE id = ?;";
      }
      $stmt = db_get_prepare_stmt($con, $sql, [$_GET["task_id"] ?? 0]);
      mysqli_stmt_execute($stmt);
    }

}

    header("Location: /index.php");
