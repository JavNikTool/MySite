<?php
ini_set('display_errors', E_ALL);

if ($_POST['passwordReg'] !== $_POST['password_confirm']) {
    header('Location: /?reload=true');
    die();
}

if(!empty($_POST['loginReg']) && !empty($_POST['passwordReg']) && !empty($_POST['password_confirm'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $login = $_POST['loginReg'];
    $password = password_hash($_POST['passwordReg'], PASSWORD_DEFAULT);
    /*$password_confirm = password_hash($_POST['password_confirm']);*/

    $sth = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
    $sth->execute([
        'login' => htmlspecialchars($login),
        'password' => htmlspecialchars($password)
    ]);
    $sth = null;
    header('Location: /');
    die();
}else {
    header('Location: /');
    die();
}
