<?php

namespace core\Registration;

class Registration
{
    public static function insertUser($conn, $pass, $log)
    {
        $sth = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        $sth->execute([
            'login' => htmlspecialchars($log),
            'password' => htmlspecialchars(password_hash($pass, PASSWORD_DEFAULT))
        ]);

        $sth = null;
        header('Location: /');
        die();
    }
}