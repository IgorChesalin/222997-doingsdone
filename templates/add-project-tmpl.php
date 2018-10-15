<h2 class="content__main-heading">Добавление проекта</h2>

<form class="form"  action="index.php?add-project-s" method="post">
  <div class="form__row">
    <label class="form__label" for="project_name">Название <sup>*</sup></label>

    <input
    class="form__input <?=isset($errors["project_name"]) ? 'form__input--error' : ''?>"
    type="text"
    name="project_name"
    id="project_name"
    value="<?=isset($_POST["project_name"]) ? htmlspecialchars($_POST["project_name"]) : ''?>"
    placeholder="Введите название проекта"
    
    >
    <?php if (isset($errors["project_name"])):?>
      <p class="form__message">
        <span class="form__message error-message">
          <?=$errors["project_name"];?>
        </span>
      </p>
    <?php endif;?>
  </div>

  <div class="form__row form__row--controls">
    <input class="button" type="submit" name="" value="Добавить">
  </div>
</form>
