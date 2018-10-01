CREATE DATABASE `155369-doingsdone`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE `155369-doingsdone`;

CREATE TABLE project (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name CHAR(50) NOT NULL,
  user_id INT NOT NULL
);

CREATE TABLE task (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name CHAR(100) NOT NULL,
  date_created DATETIME NOT NULL,
  date_deadline DATETIME DEFAULT NULL,
  completed INT DEFAULT 0,
  file CHAR(100) DEFAULT NULL,
  project_id INT DEFAULT NULL,
  user_id INT NOT NULL
);

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  reg_date DATETIME NOT NULL,
  email CHAR (50) NOT NULL,
  name CHAR (50) NOT NULL,
  password CHAR (50) NOT NULL,
  contacts CHAR (200) DEFAULT NULL
);

CREATE UNIQUE INDEX user_name ON user(name);
CREATE UNIQUE INDEX user_email ON user(email);
CREATE INDEX project ON project(name, user_id);
CREATE INDEX task ON task(name, user_id);
