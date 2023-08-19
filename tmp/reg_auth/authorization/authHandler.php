<?php
ini_set('display_errors', E_ALL);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/authorization/Authorization.php';
/*require_once $_SERVER['DOCUMENT_ROOT'] . '/core/authorization/User.php';*/

/*use core\Authorization\User;*/
use core\Authorization\Authorization;


$login = $_POST['loginAuth'];
$password = $_POST['passwordAuth'];

if (!empty($login) && !empty($password)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $sth = $conn->prepare('SELECT id FROM users where login = :login and password = :password');

    $user = new Authorization(
        login: $login,
        password: $password,
        conn: $conn
    );


    $hash = $user->getHash();
    if(!empty($hash)){

        $sth->execute([
            'login' => $login,
            'password' => $hash
        ]);

        if (count($sth->fetch(PDO::FETCH_ASSOC)) > 0 && password_verify($password, $hash)){
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $hash;
            header('Location: /');
        }else{
            header('Location: /?auth=false&auth_err=true');
        }
    }else {
        header('Location: /?auth=false&auth_err=true');
    }

}else {
   header('Location: /');
   die();
}