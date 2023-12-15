<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/user/Validator.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/user/registration/Registration.php';

use core\user\registration\Registration;
use core\user\Validator;

$login = $_POST['loginReg'];
$password = $_POST['passwordReg'];
$password_confirm = $_POST['password_confirm'];
$url = $_POST['url'];

if (!empty($login) && !empty($password) && !empty($password_confirm)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
    /**
     * @var $conn
     */
    $regValidator = new Validator(
        log: $login,
        pass: $password,
        pass_conf: $password_confirm,
        conn: $conn,
        error_code: 'reg_err'
    );

    // проверяем корректность введеных данных при регистрации
    $regValidator->checkPassConfirm();
    $regValidator->checkCyrillic();
    $regValidator->checkLogSymbolLen(logMin: 6, logMax: 16);
    $regValidator->checkPassSymbolLen(passMin: 6, passMax: 16);
    $regValidator->checkLoginUnuq();

    // Если все проверки валидности пройдены - делаем запись в бд
    Registration::insertUser(
        conn: $conn,
        pass: $password,
        log: $login
    );

    header("Location: $url");
} else {
    header("Location: $url?empty=true&reg_err=true");
    die();
}
