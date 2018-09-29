<?php

// подключение файла functions.php
require_once ('functions.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// подключаем к MySQL и создаем запрос для получения списка проектов
$link = mysqli_connect ('localhost', 'root', '', '155369-doingsdone');
mysqli_set_charset($link, "utf8");

if ($link === false) {
    print ("Ошибка подключения: " . mysqli_connect_error());

} else {
    $sql = "SELECT name FROM project WHERE user_id = 3";
    $result = mysqli_query($link, $sql);

    if($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } else {
        print ("Ошибка" . mysqli_error($link));
    }

    //что нужно выводить, чтобы список проектов выводился из базы данных?

}


//массив по списку проектов
/*$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто']; */

//массив по списку задач
$task_list = [
    [
        'title' => 'Собеседование в IT компании',
        'date' => '01.12.2018',
        'category' => 'Работа',
        'completed' => false
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date' => '25.08.2018',
        'category' => 'Работа',
        'completed' => false
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'date' => '21.12.2018',
        'category' => 'Учеба',
        'completed' => true
    ],
    [
        'title' => 'Встреча с другом',
        'date' => '22.12.2018',
        'category' => 'Входящие',
        'completed' => false
    ],
    [
        'title' => 'Купить корм для кота',
        'date' => null,
        'category' => 'Домашние дела',
        'completed' => false
    ],
    [
        'title' => 'Заказать пиццу',
        'date' => null,
        'category' => 'Домашние дела',
        'completed' => false
    ]

];

// подключение контента главной страницы
    $page_content = include_template (
        'index.php',
        [
            'show_complete_tasks' => $show_complete_tasks,
            'task_list' => $task_list
        ]
    );

// подключение страницы-лейаут
    $layout_content = include_template (
        'layout.php',
        [
            'task_list' => $task_list,
            'projects' => $projects,
            'page_content' => $page_content,
            'title' => 'Дела в порядке',
            'user_name' => 'Константин'
        ]
    );

    print ($layout_content);



?>


