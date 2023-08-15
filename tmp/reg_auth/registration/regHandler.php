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

    $regValidator = new RegValidator(log: $login, pass: $password, pass_conf: $password_confirm);
    $regValidator->CheckPassConfirm();
    $regValidator->CheckCyrillic();
    $regValidator->CheckLogSymbolLen(logMin: 6, logMax: 16);
    $regValidator->CheckPassSymbolLen(passMin: 6, passMax: 16);
    $regValidator->CheckLoginUnuq(conn: $conn);
    $regValidator->CheckPassUnuq(conn: $conn);

    Registration::Record($conn, $password, $login);
}else {
    header('Location: /');
    die();
}
