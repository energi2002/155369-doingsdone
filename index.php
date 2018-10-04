<?php

// подключение файла functions.php
require_once ('functions.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// подключаем к MySQL и создаем запрос для получения списка проектов и задач
$link = mysqli_connect ('localhost', 'root', '', '155369-doingsdone');

if ($link === false) {
    exit("Ошибка подключения к базе данных");
}

    mysqli_set_charset($link, "utf8");

    $sql_pr = "SELECT * FROM project";
    $result = mysqli_query($link, $sql_pr);
    $projects = [];

    if($result !== false) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $sql_task = "SELECT * FROM task";
    $result = mysqli_query($link, $sql_task);
    $task_list = [];

    if($result !== false) {
        $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

if (isset($_GET['id'])) {
    $active_project = $_GET['id'];

    $sql = 'SELECT * FROM task WHERE project_id= ' . $active_project;
    $result = mysqli_query($link, $sql);

    if ($result !== false) {
        $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //вот я только не поняла, правильно ли записала условие с ошибкой 404?
    if (empty($active_project) || $active_project <= 0) {
        header("HTTP/1.1 404 Not Found");
        exit("Такого проекта не существует");
    }
}


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
