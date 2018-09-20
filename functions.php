<?php

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


function countTasks($task_list, $project) {
     $amount = 0;
      foreach($task_list as $task) {
          if ($task['category'] === $project) {
               $amount++;
           }
      }
          return $amount;
}


function esc($str) {
	$title = strip_tags($str);

	return $title;
}

?>
