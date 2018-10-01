CREATE DATABASE `222997-doingsdone`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE `222997-doingsdone`;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY, -- создаем первичный ключ, даем тип число, база заполняет его автоматически, обозначаем, что это первичный ключ
  email CHAR(128) NOT NULL, -- класс короткий текст
  password CHAR(64) NOT NULL, -- максимальная размерность в скобках
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  contact TEXT DEFAULT NULL
);

CREATE UNIQUE INDEX email ON users(email);

CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title CHAR(100) NOT NULL,
  users_id INT NOT NULL
);

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  users_id INT NOT NULL, -- связь
  projects_id INT DEFAULT NULL, -- связь
  create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  deadline DATE DEFAULT NULL,
  done_date DATE DEFAULT NULL,
  title CHAR(100) NOT NULL,
  file CHAR(255)
);

CREATE INDEX title ON tasks(title);
