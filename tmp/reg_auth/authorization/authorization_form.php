<section class="authorization_form">
    <h2 class="title">
        Авторизация
    </h2>
    <form METHOD="post" class="form" action="/tmp/reg_auth/authorization/authHandler.php">
        <?php
        if(isset($_GET['auth']) && $_GET['auth'] == 'false') {
            echo "<p id='passError'>Неверный логин или пароль.</p>";
        }
        ?>

        <p><label for="loginAuth">Логин:</label></p>
        <input type="text" name="loginAuth" autocomplete="on" id="loginAuth"><br><br>

        <p><label for="passwordAuth">Пароль:</label></p>
        <input type="Password" name="passwordAuth" id="passwordAuth"><br><br>

        <input type="submit" value="Вход">
    </form>
    <p class="form_log-in">если вы забыли пароль, нажмите <a href="#" class="pass_recovery_activ">восстановить пароль.</a></p>
    <p class="form_log-in"><a href="#" class="activ_reg_form">Регистрация.</a></p>
    <span class="close">X</span>
</section>

<div class="auth-reg_form_wrap">

</div>
