<?php

/**
 * @var $conn
 */

ini_set('display_errors', E_ALL);
session_start();
require_once 'vendor/autoload.php';

use core\user\User;

$login = $_REQUEST['adm_log'];
$password = $_REQUEST['adm_pass'];

if(!empty($login) && !empty($password)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $user = new User($login, $password, $conn);

    if($user->UserCheck() && $user->isAdmin()){
        $_SESSION['login'] = $login;
        $_SESSION['admin'] = true;
        header('Location: /admin/settings');
    }
    else {
        header('Location: /');
        die();
    }
}