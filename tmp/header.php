<?php

/**
 * @var $settings
 */

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/settings_init.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/src/img/favicon/site.webmanifest">
    <?php
    echo $settings->list()['description'];
    echo $settings->list()['cssPath'];
    echo $settings->list()['jqueryPath'];
    echo $settings->list()['preloader'];
    ?>
    <title><?= $settings->list()['title'];?></title>
</head>
<body>
<!-- preloader -->
<div class="svg-loader">
    <svg class="svg-container" height="100" width="100" viewBox="0 0 100 100">
        <circle class="loader-svg bg" cx="50" cy="50" r="45"></circle>
        <circle class="loader-svg animate" cx="50" cy="50" r="45"></circle>
    </svg>
    <p class="preloaderTitle">Загрузка.</p>
</div>

<!--header-->
<header>
    <div class="container">
        <div class="header_main">
            <a href="/" class="header_main_wrap ajax">
                    <div class="header_main_logo"><img src="/src/img/logo/css.png" alt="css"></div>
                    <div class=" header_main_logo"><img src="/src/img/logo/html.png" alt="html"></div>
                    <div class="header_main_logo"><img src="/src/img/logo/php.png" alt="php"></div>
            </a>
            <p>Добро пожаловать на сайт-персональный блог <br> <span>Никиты Кремнева</span></p>
            <div class="header_main_photo">
                <img src="/src/img/photo/ph.jpg" alt="myPhoto">
            </div>
        </div>
    </div>
        <div class="visitors_block">
            <?php
                if (!empty($_SESSION['login'])) {
                    echo "<span class='welcom'>$_SESSION[login]</span>";
                    ?>
                    <form action="/tmp/exitHandler.php" method="post">
                        <input class="sessDestr" type="submit" value="выход">
                        <input name="url" type="hidden" value="<?=$_SERVER['REQUEST_URI']?>">
                    </form>
                    <?php
                }else {
                    echo "<span class='log-in'>Посетитель</span>";
                }
            ?>
        </div>
</header>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/reg_auth/authorization/authorization_form.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/reg_auth/registration/registration_form.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/reg_auth/pass_recovery/password_recovery.php';
?>