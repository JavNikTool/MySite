<?php

namespace core\user\registration;

class Registration
{
    public static function insertUser($conn, $pass, $log)
    {
        $sth = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        $options = [
          'cost' => 8,
        ];
        $sth->execute([
            'login' => htmlspecialchars($log),
            'password' => htmlspecialchars(password_hash($pass, PASSWORD_BCRYPT, $options))
        ]);

        $sth = null;
        header('Location: /');
        die();
    }
}