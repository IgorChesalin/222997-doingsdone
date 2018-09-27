CREATE DATABASE doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY, -- создаем первичный ключ, даем тип число, база заполняет его автоматически, обозначаем, что это первичный ключ
  email CHAR(128), -- класс короткий текст
  password CHAR(64), -- максимальная размерность в скобках
  create_date DATE,
  contact TEXT
);

CREATE UNIQUE INDEX email ON users(email);

CREATE TABLE projects (
  project_id INT AUTO_INCREMENT PRIMARY KEY,
  title CHAR(50),
  user_id INT
);

CREATE TABLE tasks (
  task_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT, -- связь
  project_id INT, -- связь
  create_date DATE,
  deadline DATE,
  done_date DATE,
  title CHAR,
  link TEXT,
  status INT DEFAULT 0
);
