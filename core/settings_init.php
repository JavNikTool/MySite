<?php

use core\settings\Settings;

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/settings/Settings.php';

$settings = Settings::get();



$settings->description = '<meta name="description" content="блог программиста Никиты Кремнева">';
$settings->title = match ($_SERVER['PHP_SELF'])
    {
         "/about/index.php" => "Обо мне",
         "/contacts/index.php" => "Связь со мной",
         "/blog/index.php" => "Блог",
         default => "Кремнев Никита персональный сайт",
    };
$settings->cssPath = '<link rel="stylesheet" href="/style.css" type="text/css">';
$settings->jqueryPath = '<script src="/src/js/jquery-3.6.3.min.js" type="application/javascript"></script>';
$settings->jsPath = '<script src="/src/js/script.js" type="application/javascript"></script>';
$settings->preloader = '<script src="/src/js/preloader.js" type="application/javascript"></script>';
$settings->ajax = '<script async src="/src/js/ajax.js" type="application/javascript"></script>';