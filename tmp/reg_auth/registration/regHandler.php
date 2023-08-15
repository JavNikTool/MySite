<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/registration/RegValidator.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/registration/Registration.php';

use core\Registration\RegValidator;
use core\Registration\Registration;

$login = $_POST['loginReg'];
$password = $_POST['passwordReg'];
$password_confirm = $_POST['password_confirm'];

if(!empty($login) && !empty($password) && !empty($password_confirm)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    RegValidator::CheckPassConfirm($password, $password_confirm);
    RegValidator::CheckCyrillic($login, $password);
    RegValidator::CheckLogSymbolLen($login, 6, 16);
    RegValidator::CheckPassSymbolLen($password, 6, 16);
    RegValidator::CheckLoginUnuq($conn, $login);
    RegValidator::CheckPassUnuq($conn, $password);

    Registration::Record($conn, $password, $login);
}else {
    header('Location: /');
    die();
}
