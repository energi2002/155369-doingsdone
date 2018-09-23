CREATE DATABASE doingsdone
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE project (
  id INT AUTO_INCREMENT PRIMARY KEY,
  project_name CHAR(50),
  user_id INT
);

CREATE TABLE task (
  id INT AUTO_INCREMENT PRIMARY KEY,
  task_name CHAR(100),
  date_created DATETIME,
  date_completed DATETIME,
  date_deadline DATETIME,
  date_status INT,
  file CHAR(100),
  project_id INT,
  user_id
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date DATETIME,
  email CHAR (50),
  user_name CHAR (50),
  user_password CHAR (50),
  user_contacts CHAR (200)
);

CREATE UNIQUE INDEX user_name ON users(user_name);
CREATE UNIQUE INDEX user_email ON users(email);
CREATE INDEX project ON project(project_name, user_id);
CREATE INDEX task ON task(task_name, user_id);
