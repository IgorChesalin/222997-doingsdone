USE `222997-doingsdone`;

INSERT INTO users (email, password, name) VALUES
  ("igor@gmail.com", "12345", "igor"),
  ("masha@gmail.com", "54321", "masha");

INSERT INTO projects (title, users_id) VALUES
  ("Входящие", 1),
  ("Учеба", 1),
  ("Работа", 1),
  ("Домашние дела", 1),
  ("Авто", 1);

INSERT INTO tasks (users_id, projects_id, create_date, deadline, done_date, title, file) VALUES
  (1, 3, "2018-09-01", "2018-10-15", NULL, "Собеседование в IT компании", NULL),
  (1, 3, "2018-09-05", "2018-09-30", NULL,  "Выполнить тестовое задание", NULL),
  (1, 2, "2018-09-07", "2018-09-27", "2018-09-20", "Сделать задание первого раздела", NULL),
  (1, 1, "2018-09-08", NULL, NULL, "Встреча с другом", NULL),
  (1, 4, "2018-09-10", "2018-09-29", NULL, "Купить корм для кота", NULL),
  (1, 4, "2018-09-10", NULL, NULL, "Заказать пиццу", NULL);

-- получить список из всех проектов для одного пользователя;
SELECT title FROM projects WHERE users_id = 1;

-- получить список из всех задач для одного проекта;
SELECT title FROM tasks WHERE projects_id = 3;

-- пометить задачу как выполненную;
UPDATE tasks SET done_date = "2018-09-27" WHERE id = 4;

-- получить все задачи для завтрашнего дня;
SELECT title FROM tasks WHERE deadline = ADDDATE(CURDATE(), INTERVAL 1 DAY);
-- SELECT title FROM tasks WHERE done_date = NULL;
-- NOW() + INTERVAL 1 DAY

-- обновить название задачи по её идентификатору.
UPDATE tasks SET title = "Купить корм для кота и рыб" WHERE id = 5;
