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

    $user = new Authorization(
        login: $login,
        password: $password,
        conn: $conn
    );
    $user->checkUser();

}else {
   header('Location: /?auth=false&auth_err=true');
   die();
}