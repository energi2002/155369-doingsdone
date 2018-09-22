<?php

// функция подключения шаблонов
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require_once $name;

    $result = ob_get_clean();

return $result;
}

// функция подсчета задач в определённом проекте
function countTasks($task_list, $project) {
     $amount = 0;
     foreach($task_list as $task) {
          if ($task['category'] === $project) {
               $amount++;
           }
      }
          return $amount;
}

// функция фильтрации вносимых данных от пользователя
function esc($str) {
	$title = strip_tags($str);

	return $title;
}

// функция проверки кол-ва дней до истечения срока задачи
function getImportantTaskClass($task)
{
    if ($task["date"] === null) {
        return '';
    }

    $cur_day_ts = time();
    $deadline_ts = strtotime($task["date"]);
    $days_until_deadline = floor(($deadline_ts - $cur_day_ts) / 86400);

    if ($days_until_deadline === 0 || (!$task['completed'] && $days_until_deadline < 0)) {
		return "task--important";
    } else {
         return '';
    }
}
?>
