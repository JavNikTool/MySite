<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/settings/Settings.php';

$settings = new Settings();



$settings->description = '<meta name="description" content="блог программиста Никиты Кремнева">';
$settings->title = match ($_SERVER['PHP_SELF'])
    {
         "/about/index.php" => "Обо мне",
         "/contacts/index.php" => "Связь со мной",
         "/blog/index.php" => "Блог",
         default => "Кремнев Никита персональный сайт",
    };
$settings->cssPath = '<link rel="stylesheet" href="/css/style.css">';
$settings->cssBootstrapPath = '<link rel="stylesheet" href="/css/bootstrap.min.css">';
$settings->cssBootstrapRebootPath = '<link rel="stylesheet" href="/css/bootstrap-reboot.min.css">';
$settings->jqueryPath = '<script src="/js/jquery-3.6.3.min.js"></script>';
$settings->jsPath = '<script src="/js/script.js"></script>';