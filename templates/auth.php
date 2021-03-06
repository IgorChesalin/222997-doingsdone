        <h2 class="content__main-heading">Вход на сайт</h2>

        <form class="form" action="index.php?auth" method="post">
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
            class="form__input <?=isset($errors["password"]) ? 'form__input--error' : ''?>"
            type="password"
            name="password"
            id="password"
            value=""
            placeholder="Введите пароль"
            required
            >
            <?php if (isset($errors["password"])):?>
            <p class="form__message"><?=$errors["password"];?></p>
            <?php endif;?>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Войти">
          </div>
        </form>
