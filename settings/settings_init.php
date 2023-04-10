<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/settings/Settings.php';

$settings = new Settings();

$settings->description = "блог программиста Никиты Кремнева";

$settings->title = match ($_SERVER['PHP_SELF'])
    {
         "/about/index.php" => "Обо мне",
         "/contacts/index.php" => "Связь со мной",
         "/blog/index.php" => "Блог",
         default => "Кремнев Никита персональный сайт",
    };
