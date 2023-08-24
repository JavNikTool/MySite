<?php

namespace core\user\pass_recovery;

class PassRecovery
{
    public static function updatePass($conn, $pass, $log)
    {
        $sth = $conn->prepare('UPDATE users SET password = :password WHERE login = :login');
        $sth->execute(['password' => password_hash($pass, PASSWORD_DEFAULT), 'login' => $log]);

        $sth = null;
        header('Location: /');
        die();
    }
}