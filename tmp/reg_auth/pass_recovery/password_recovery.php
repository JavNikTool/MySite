<section class="pass_recovery_form">
    <h2 class="title">
        Восстановление пароля
    </h2>
    <form METHOD="post" class="form" action="/tmp/reg_auth/pass_recovery/recoveryHandler.php">
        <?php

        if (isset($_GET['login']) && $_GET['login'] == 'false') {
            echo "<p id='passError'>Неверный логин.</p>";
        } elseif (isset($_GET['pass_error']) && $_GET['pass_error'] == 'true') {
            echo "<p id='passError'>Ошибка подтверждения пароля.</p>";
        } elseif (isset($_GET['kirillica']) && $_GET['kirillica'] == 'true') {
            echo "<p id='passError'>Недопустимые символы. Допускается использование только латинских букв и цифр.</p>";
        } elseif (isset($_GET['count']) && $_GET['count'] == 'true') {
            echo "<p id='passError'>Допустимое количество симоволов: от 6 до 16 символов.</p>";
        }
        ?>

        <p><label for="loginRecovery">Логин:</label></p>
        <input type="text" name="loginRecovery" autocomplete="on" id="loginRecovery"><br><br>

        <p><label for="passwordRecovery">Новый пароль:</label></p>
        <input type="Password" name="passwordRecovery" id="passwordRecovery"><br><br>

        <p><label for="passwordSubmitRecovery">Подтвердите пароль: </label></p>
        <input type="Password" name="passwordSubmitRecovery" id="passwordSubmitRecovery"><br><br>
        <input name="url" type="hidden"
               value="<?= $_SERVER['REQUEST_URI'] = str_contains($_SERVER['REQUEST_URI'], '?') ? strstr($_SERVER['REQUEST_URI'], '?', true) : $_SERVER['REQUEST_URI']; ?>">

        <input type="submit" value="Восстановить">
    </form>

    <span class="close">X</span>
</section>

<div class="auth-reg_form_wrap">

</div>
