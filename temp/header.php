<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="блог программиста Никиты Кремнева">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php require_once "title.php";?></title>
</head>
<body>
<!-- preloader -->
<div class="svg-loader">
    <svg class="svg-container" height="100" width="100" viewBox="0 0 100 100">
        <circle class="loader-svg bg" cx="50" cy="50" r="45"></circle>
        <circle class="loader-svg animate" cx="50" cy="50" r="45"></circle>
    </svg>
</div>

<!--header-->
<header>
    <div class="container">
        <div class="header_main">
            <a href="/" class="header_main_wrap">
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