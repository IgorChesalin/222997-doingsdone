<h2 class="content__main-heading">Регистрация аккаунта</h2>

<form class="form" action="index.php?reg" method="post">
  <div class="form__row">
    <label class="form__label" for="email">E-mail <sup>*</sup></label>

    <input
      class="form__input <?=isset($errors["email"]) ? 'form__input--error' : ''?>"
      type="text"
      name="email"
      id="email"
      value="<?=isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : ''?>"
      placeholder="Введите e-mail"
      required
    >
    <?php if (isset($errors["email"])):?>
    <p class="form__message"><?=$errors["email"];?></p>
    <?php endif;?>
  </div>

  <div class="form__row">
    <label class="form__label" for="password">Пароль <sup>*</sup></label>

    <input
    class="form__input"
    type="password"
    name="password"
    id="password"
    value=""
    placeholder="Введите пароль"
    required
    >
  </div>

  <div class="form__row">
    <label class="form__label" for="name">Имя <sup>*</sup></label>

    <input
    class="form__input"
    type="text"
    name="name"
    id="name"
    value="<?=isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : ''?>"
    placeholder="Введите имя"
    required
    >
  </div>

  <div class="form__row form__row--controls">
    <?php if (!empty($errors)):?>
    <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
    <?php endif;?>
    <input class="button" type="submit" name="" value="Зарегистрироваться">
  </div>
</form>
