<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/index.php?all" class="tasks-switch__item <?=isset($_GET["all"]) ? 'tasks-switch__item--active' : ''?>">Все задачи</a>
        <a href="/index.php?today" class="tasks-switch__item <?=isset($_GET["today"]) ? 'tasks-switch__item--active' : ''?>">Повестка дня</a>
        <a href="/index.php?tomorrow" class="tasks-switch__item <?=isset($_GET["tomorrow"]) ? 'tasks-switch__item--active' : ''?>">Завтра</a>
        <a href="/index.php?overdue" class="tasks-switch__item <?=isset($_GET["overdue"]) ? 'tasks-switch__item--active' : ''?>">Просроченные</a>
    </nav>

    <label class="checkbox">
        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
        <input class="checkbox__input visually-hidden show_completed"
               <?php if ($show_complete_tasks): ?>checked<?php endif; ?>
               type="checkbox">
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>

<table class="tasks">

  <?php foreach ($tasks as $key => $val): ?>
<!-- переименовываем ключи массива  -->
    <?php if (empty($val["done_date"]) || $show_complete_tasks===1): ?>

    <tr class="tasks__item task <?php if (!empty($val["done_date"])): ?>task--completed<?php endif; ?> <?php if (is_task_important($val)): ?>task--important<?php endif; ?>">

        <td class="task__select">
            <label class="checkbox task__checkbox">
              <!-- переименовываем ключи массива  -->
                <input
                class="checkbox__input visually-hidden task__checkbox"
                <?php if (!empty($val["done_date"])): ?>checked<?php endif; ?>
                type="checkbox"
                value="<?= $val["id"]?>"
                >
                <span class="checkbox__text"><?= htmlspecialchars($val["title"]);?></span>
            </label>
        </td>

        <td class="task__file">
          <?php if (!empty($val["file"])):?>
            <a download class="download-link" href="<?= htmlspecialchars($val["file"]);?>"></a>
          <?php endif; ?>
        </td>

        <td class="task__date">
            <?= htmlspecialchars($val["deadline"]);?>
        </td>

    </tr>

    <?php endif; ?>

    <?php endforeach; ?>
</table>
