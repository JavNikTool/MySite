<?php
switch ($_SERVER['PHP_SELF']){
    case "/about/index.php":
        echo "Обо мне";
        break;
    case "/contacts/index.php":
        echo "Связь со мной";
        break;
    case "/blog/index.php":
        echo "Блог";
        break;
    default:
        echo "Кремнев Никита персональный сайт";
    break;
}