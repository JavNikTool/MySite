<section class="registration_form">
    <h2 class="title">
        Регистрация
    </h2>
    <form method="POST" action="/tmp/reg_auth/registration/regHandler.php" class="form">
        <?php
        if(isset($_GET['kirillica']) && $_GET['kirillica'] == 'true') {
            echo "<p id='passError'>Недопустимые символы. Допускается использование только латинских букв и цифр.</p>";
        }
        elseif (isset($_GET['uniq']) && $_GET['uniq'] == 'false'){
            echo "<p id='passError'>Логин занят!</p>";
        }
        elseif (isset($_GET['uniqp']) && $_GET['uniqp'] == 'false'){
            echo "<p id='passError'>Пароль занят!</p>";
        }
        elseif (isset($_GET['count']) && $_GET['count'] == 'true'){
            echo "<p id='passError'>Допустимое количество симоволов: от 6 до 16 символов.</p>";
        }
        elseif (isset($_GET['empty']) && $_GET['empty'] == 'true'){
            echo "<p id='passError'>Не заполнено одно из полей.</p>";
        }
        ?>
        <p><label for="loginReg">Логин:</label></p>
        <input type="text" name="loginReg" id="loginReg"><br><br>

        <p><label for="passwordReg">Пароль:</label></p>
        <input type="Password" name="passwordReg" id="passwordReg"><br><br>

        <p><label for="password_confirm">Подтвердите пароль:</label></p>
        <input type="Password" name="password_confirm" id="password_confirm">

        <?php
        if(isset($_GET['pass_error']) && $_GET['pass_error'] == 'true') {
            echo "<p id='passError'>Ошибка подтверждения пароля.</p>";
        }
        ?>

        <input type="submit" value="регистрация">
    </form>
    <span class="close">X</span>
</section>

<div class="auth-reg_form_wrap">

</div>
