<?php
ini_set('display_errors', E_ALL);
session_start();
$login = $_POST['loginAuth'];
$password = $_POST['passwordAuth'];

if (!empty($login) && !empty($password)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $sth = $conn->prepare('SELECT id FROM users where login = :login and password = :password');
    $passSth = $conn->prepare("SELECT password FROM users WHERE login = :login");

    $passSth->execute(['login' => $login]);
    $hash = $passSth->fetch(PDO::FETCH_ASSOC)['password'];
    $sth->execute([
        'login' => $login,
        'password' => $hash
    ]);

    if (count($sth->fetch(PDO::FETCH_ASSOC)) > 0 && password_verify($password, $hash)){
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $hash;
        header('Location: /');
    }else{
        header('Location: /');
    }

}else {
   header('Location: /');
   die();
}