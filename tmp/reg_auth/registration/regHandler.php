<?php
ini_set('display_errors', E_ALL);

define('LOGIN', $_POST['loginReg']);
define('PASSWORD', $_POST['passwordReg']);
define('PASSWORD_CONFIRM', $_POST['password_confirm']);



// проверяем совпадает ли пароль с паролем-подтверждением
if (PASSWORD !== PASSWORD_CONFIRM) {
    header('Location: /?reload=true');
    die();
}
// проверка на кириллицу
/*if (preg_match("/[а-яА-Я]/", )){

}*/

if(!empty(LOGIN) && !empty(PASSWORD) && !empty(PASSWORD_CONFIRM)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';




    $sth = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
    $sth->execute([
        'login' => htmlspecialchars(LOGIN),
        'password' => htmlspecialchars(password_hash(PASSWORD, PASSWORD_DEFAULT))
    ]);
    $sth = null;
    header('Location: /');
    die();

}else {
    header('Location: /');
    die();
}
