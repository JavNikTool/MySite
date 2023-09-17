<?php
ini_set('display_errors', E_ALL);
session_start();


$login = $_REQUEST['adm_log'];
$password = $_REQUEST['adm_pass'];

if(!empty($login) && !empty($password)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/user/User.php';

    $user = new \core\user\User($login, $password, $conn);

    if($user->isAdmin()){
        $_SESSION['login'] = $login;
        header('Location: /admin/start');
    }
    else {
        header('Location: /');
        die();
    }
}