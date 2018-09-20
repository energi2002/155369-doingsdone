<?php

require_once ('functions.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

$task_list = [
    [
        'title' => 'Собеседование в IT компании',
        'date' => '01.12.2018',
        'category' => 'Работа',
        'completed' => false
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date' => '25.12.2018',
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
        'date' => 'Нет',
        'category' => 'Домашние дела',
        'completed' => false
    ],
    [
        'title' => 'Заказать пиццу',
        'date' => 'Нет',
        'category' => 'Домашние дела',
        'completed' => false
    ]

];

    $page_content = include_template (
        'index.php',
        [
            'show_complete_tasks' => $show_complete_tasks,
            'task_list' => $task_list
        ]
    );

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


