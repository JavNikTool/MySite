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
$settings->tinyCdn = '<script src="https://cdn.tiny.cloud/1/ioealj9f1t2upeyf1w0jp41ee18qqltr987i589ovtgox92j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>';
$settings->JqueryToTiny = '<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>';
$settings->jsPath = '<script src="/src/js/script.js" type="application/javascript"></script>';
$settings->jsFuncPath = '<script src="/src/js/func.js" type="application/javascript"></script>';
$settings->preloader = '<script src="/src/js/preloader.js" type="application/javascript"></script>';
$settings->ajax = '<script async src="/src/js/ajax.js" type="application/javascript"></script>';