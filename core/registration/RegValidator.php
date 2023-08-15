<?php

namespace core\Registration;

class RegValidator
{
    private ?string $log = null;
    private ?string $pass = null;
    private ?string $pass_conf = null;

    public function __construct($log, $pass, $pass_conf)
    {
        $this->log = $log;
        $this->pass = $pass;
        $this->pass_conf = $pass_conf;
    }


    // проверяем совпадает ли пароль с паролем-подтверждением
    public function CheckPassConfirm(): void
    {
        if ($this->pass !== $this->pass_conf) {
            header('Location: /?reload=true&rae=true');
            die();
        }
    }

    // проверка на кириллицу
    public function CheckCyrillic(): void
    {
        if (preg_match("/[а-яА-Я]/", $this->log) || preg_match("/[а-яА-Я]/", $this->pass)){
            header('Location: /?kirillica=true&rae=true');
            die();
        }
    }

    // проверка кол-ва символов логина
    public function CheckLogSymbolLen($logMin, $logMax): void
    {
        if(strlen($this->log) < $logMin || strlen($this->log) > $logMax){
            header('Location: /?count=true&rae=true');
            die();
        }
    }

    // проверка кол-ва символов пароля
    public function CheckPassSymbolLen($passMin, $passMax): void
    {
        if(strlen($this->pass) < $passMin || strlen($this->pass) > $passMax){
            header('Location: /?count=true&rae=true');
            die();
        }
    }

    // проверка уникальности логина
    public function CheckLoginUnuq($conn): void
    {
        $sth = $conn->prepare('SELECT id FROM users where login = :login');
        $sth->execute(['login' => $this->log]);
        if (count($sth->fetchAll()) > 0){
            $sth = null;
            header('Location: /?uniq=false&rae=true');
            die();
        }
    }


    // проверка уникальности пароля
    public function CheckPassUnuq($conn): void
    {
        $sth = $conn->query('SELECT password FROM users');
        while ($res = $sth->fetch(\PDO::FETCH_ASSOC)){
            if (password_verify($this->pass, $res['password'])){
                $sth = null;
                header('Location: /?uniqp=false&rae=true');
                die();
            }
        }
    }
}