<section class="registation_form">
    <h2 class="title">
        Регистрация
    </h2>
    <form method="POST" action="/tmp/registation/regHandler.php" class="form">

        <p><label for="loginReg">Логин:</label></p>
        <input type="text" name="loginReg" id="loginReg"><br><br>

        <p><label for="passwordReg">Пароль:</label></p>
        <input type="Password" name="passwordReg" id="passwordReg"><br><br>

        <p><label for="password_confirm">Подтвердите пароль:</label></p>
        <input type="Password" name="password_confirm" id="password_confirm">

        <?php
        if(isset($_GET['reload']) && $_GET['reload'] == 'true') {
            echo "<p id='passError'>Ошибка подтверждения пароля.</p>";
        }
        ?>

        <input type="submit" value="регистрация">
    </form>
    <p class="form_log-in">Если вы уже зарегистрированы, нажмите <a href="#" class="activ_aut_form">вход.</a></p>
    <span class="close">X</span>
</section>

<div class="registation_form_wrap">

</div>
