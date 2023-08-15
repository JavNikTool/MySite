<?php

namespace core\Registration;




class RegValidator
{
    // проверяем совпадает ли пароль с паролем-подтверждением
    public static function CheckPassConfirm($pass, $pass_conf)
    {
        if ($pass !== $pass_conf) {
            header('Location: /?reload=true&rae=true');
            die();
        }
    }

    // проверка на кириллицу
    public static function CheckCyrillic($log, $pass)
    {
        if (preg_match("/[а-яА-Я]/", $log) || preg_match("/[а-яА-Я]/", $pass)){
            header('Location: /?kirillica=true&rae=true');
            die();
        }
    }

    // проверка кол-ва символов логина
    public static function CheckLogSymbolLen($log, $LogMin, $LogMax)
    {
        if(strlen($log) < $LogMin || strlen($log) > $LogMax){
            header('Location: /?count=true&rae=true');
            die();
        }
    }

    // проверка кол-ва символов пароля
    public static function CheckPassSymbolLen($pass, $PassMin, $PassMax)
    {
        if(strlen($pass) < $PassMin || strlen($pass) > $PassMax){
            header('Location: /?count=true&rae=true');
            die();
        }
    }

    // проверка уникальности логина
    public static function CheckLoginUnuq($conn, $log)
    {
        $sth = $conn->prepare('SELECT id FROM users where login = :login');
        $sth->execute(['login' => $log]);
        if (count($sth->fetchAll()) > 0){
            $sth = null;
            header('Location: /?uniq=false&rae=true');
            die();
        }
    }


    // проверка уникальности пароля
    public static function CheckPassUnuq($conn, $pass)
    {
        $sth = $conn->query('SELECT password FROM users');
        while ($res = $sth->fetch(\PDO::FETCH_ASSOC)){
            if (password_verify($pass, $res['password'])){
                $sth = null;
                header('Location: /?uniqp=false&rae=true');
                die();
            }
        }
    }
}