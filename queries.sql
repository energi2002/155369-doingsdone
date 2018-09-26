USE '155369-doingsdone';

INSERT INTO project (name, user_id)
VALUES
      ('Входящие', 1),
      ('Учеба', 1),
      ('Работа', 1),
      ('Домашние дела', 2),
      ('Авто', 2);

INSERT INTO task (name, date_created, date_deadline, status, project_id, user_id)
VALUES
      ('Собеседование в IT компании', NOW(), '01.12.2018 00:00', 0, 3, 1),
      ('Выполнить тестовое задание', '23.08.2018 12:00', '25.08.2018 00:00',  0, 3, 1),
      ('Сделать задание первого раздела', NOW(), '21.12.2018 00:00', 1, 2, 1)
      ('Встреча с другом', NOW(), '22.12.2018 00:00', 0, 1, 1),
      ('Купить корм для кота', '02.09.2018 12:00', NULL, 0, 4, 2),
      ('Заказать пиццу', '03.09.2018 12:00', NULL, 0, 4, 2);

INSERT INTO user (reg_date, email, name, password)
VALUES
      ('01.09.2019 12:00', 'konstantin.m@yandex.ru', 'Константин', 'konstan_TIN_2018'),
      ('02.09.2019 12:00', 'super-mary@mail.ru', 'Мария', 'supersecret123');


/* получить список из всех проектов для одного пользователя */
SELECT * FROM project WHERE user_id = 1;

/* получить список из всех задач для одного проекта */
SELECT * FROM task WHERE project_id = 4;

/* пометить задачу как выполненную */
UPDATE task SET status = 1 WHERE id = 1;

/* получить все задачи для завтрашнего дня */
SELECT * FROM task WHERE DATEDIFF(CURDATE(), date_deadline) = 1;

/* обновить название задачи по её идентификатору */
UPDATE task SET name='Заказать бургеры' WHERE id = 6;
