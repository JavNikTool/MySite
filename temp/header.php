<?php
require_once
    $_SERVER['DOCUMENT_ROOT'] . '/settings/settings_init.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <?php
    echo $settings->list()['description'];
    echo $settings->list()['cssBootstrapRebootPath'];
    echo $settings->list()['cssBootstrapPath'];
    echo $settings->list()['cssPath'];
    ?>
    <title><?= $settings->list()['title'];?></title>
</head>
<body>


<!--header-->
<header>
    <div class="container">
        <div class="header_main">
            <a href="/" class="header_main_wrap ajax">
                    <div class="col-sm-2 header_main_logo"><img src="/img/logo/css.png" alt="css"></div>
                    <div class="col-sm-2 header_main_logo"><img src="/img/logo/html.png" alt="html"></div>
                    <div class="col-sm-2 header_main_logo"><img src="/img/logo/php.png" alt="php"></div>
            </a>
            <p>Добро пожаловать на сайт-персональный блог <span>Никиты Кремнева</span></p>
            <div class="header_main_photo">
                <img src="/img/photo/ph.jpg" alt="myPhoto">
            </div>
        </div>
    </div>
    <span class="log-in">Посетитель</span>
</header>

<?php
require_once 'registation/authorization_form.php';
require_once 'registation/registation.php';
?>