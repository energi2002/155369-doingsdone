
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed"
                               <?php if (1 === $show_complete_tasks): ?>checked<?php endif; ?>
                               type="checkbox">
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">

                <?php foreach ($task_list as $task): ?>
                    <?php if(!$task['completed'] || 1 === $show_complete_tasks): ?>
                    <tr class="tasks__item task
                        <?=$task['completed'] ? 'task--completed' : '' ?>
                        <?=getImportantTaskClass($task); ?>">
                                           <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1"
                                       <?php if ($task['completed']): ?>checked<?php endif; ?>>
                                <span class="checkbox__text"><?=esc($task['name']); ?></span>
                            </label>
                        </td>
                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>
                        <td class="task__date"><?=changeDateFormat($task['date_deadline']); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </table>
