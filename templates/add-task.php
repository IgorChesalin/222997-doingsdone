        <h2 class="content__main-heading">Добавление задачи</h2>
        <form class="form"  action="index.php?add-task" method="post" enctype="multipart/form-data">
<!-- НАЗВАНИЕ -->
          <div class="form__row">
            <label class="form__label" for="title">Название <sup>*</sup></label>
            <input
              class="form__input <?=isset($errors["title"]) ? 'form__input--error' : ''?>"
              type="text"
              name="title"
              id="title"
              value="<?=isset($_POST["title"]) ? htmlspecialchars($_POST["title"]) : ''?>"
              placeholder="Введите название"
              required
            >
            <?php if (isset($errors["title"])):?>
              <p class="form__message">
                <span class="form__message error-message">
                  <?=$errors["title"];?>
                </span>
              </p>
            <?php endif;?>
          </div>

<!-- ПРОЕКТ -->
          <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>
            <select
              class="form__input form__input--select <?=isset($errors["project"]) ? 'form__input--error' : ''?>"
              name="project"
              id="project"
              >
              <?php foreach ($projects as $project): ?>
                <option value="<?=($project['id']);?>" <?=isset($_POST["project"]) && ($project['id'] === (int)$_POST["project"]) ? "selected" : ''?>>
                    <?= htmlspecialchars($project["title"]);?>
                </option>
              <?php endforeach; ?>
            </select>

            <?php if (isset($errors["project"])):?>
              <p class="form__message">
                <span class="form__message error-message">
                  <?=$errors["project"];?>
                </span>
              </p>
            <?php endif;?>
          </div>

<!-- ДАТА -->
          <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>
            <input class="form__input form__input--date <?=isset($errors["date"]) ? 'form__input--error' : ''?>"
            type="date"
            name="date"
            id="date"
            value="<?=isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : ''?>"
            placeholder="Введите дату в формате ДД.ММ.ГГГГ"
            >
            <?php if (isset($errors["date"])):?>
              <p class="form__message">
                <span class="form__message error-message">
                  <?=$errors["date"];?>
                </span>
              </p>
            <?php endif;?>
          </div>

<!-- ФАЙЛ -->
          <div class="form__row">
            <label class="form__label" for="preview">Файл</label>
            <div class="form__input-file">
              <input class="visually-hidden" type="file" name="preview" id="preview" value="">

              <label class="button button--transparent" for="preview">
                <span>Выберите файл</span>
              </label>
            </div>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
          </div>
        </form>
