<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/user/Validator.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/user/pass_recovery/PassRecovery.php';

use core\user\pass_recovery\PassRecovery;
use core\user\Validator;

$login = $_POST['loginRecovery'];
$password = $_POST['passwordRecovery'];
$passwordSubmit = $_POST['passwordSubmitRecovery'];
$url = $_POST['url'];

if (!empty($login) && !empty($password) && !empty($passwordSubmit)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
    /**
     * @var $conn
     */
    $recoverValidator = new Validator(
        log: $login,
        pass: $password,
        pass_conf: $passwordSubmit,
        conn: $conn,
        error_code: 'recover_err'
    );

    $recoverValidator->checkLogin();
    $recoverValidator->checkPassConfirm();
    $recoverValidator->checkCyrillic();
    $recoverValidator->checkPassSymbolLen(6, 16);

    PassRecovery::updatePass(
        conn: $conn,
        pass: $password,
        log: $login
    );

} else {
    header("Location: $url?login=false&recover_err=true");
    die();
}