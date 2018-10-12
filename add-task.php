<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if (empty($_POST["title"])) {
    $errors["title"] = "Не заполнено";
  }
  if (empty($_POST["project"])) {
    $errors["project"] = "Не заполнено";
  }
    //ищем введенное значение в списке возможных
    elseif (!in_array($_POST["project"], array_column($projects, "id"))) {
    $errors["project"] = "Выберите существующий проект";
    }
}



//дописать валидацию
//последнее условие - если в массиве ошибок пусто, то сохранить задачу и перенаправить на главную страницу
