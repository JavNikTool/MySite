<?php

namespace core\user;

class Validator
{
    private ?string $log = null;
    private ?string $pass = null;
    private ?string $pass_conf = null;
    private ?\PDO $conn = null;

    private ?string $error_code = null;


    public function __construct($log, $pass, $pass_conf, $conn, $error_code)
    {
        $this->log = $log;
        $this->pass = $pass;
        $this->pass_conf = $pass_conf;
        $this->conn = $conn;
        $this->error_code = $error_code;
    }


    // проверяем совпадает ли пароль с паролем-подтверждением
    public function checkPassConfirm(): void
    {
        if ($this->pass !== $this->pass_conf) {
            header("Location: /?pass_error=true&$this->error_code=true");
            die();
        }
    }

    // проверка на кириллицу
    public function checkCyrillic(): void
    {
        if (preg_match("/[а-яА-Я]/", $this->log) || preg_match("/[а-яА-Я]/", $this->pass)) {
            header("Location: /?kirillica=true&$this->error_code=true");
            die();
        }
    }

    // проверка кол-ва символов логина
    public function checkLogSymbolLen($logMin, $logMax): void
    {
        if (strlen($this->log) < $logMin || strlen($this->log) > $logMax) {
            header("Location: /?count=true&$this->error_code=true");
            die();
        }
    }

    // проверка кол-ва символов пароля
    public function checkPassSymbolLen($passMin, $passMax): void
    {
        if (strlen($this->pass) < $passMin || strlen($this->pass) > $passMax) {
            header("Location: /?count=true&$this->error_code=true");
            die();
        }
    }

    // проверка уникальности логина
    public function checkLoginUnuq(): void
    {
        $sth = $this->conn->prepare('SELECT id FROM users WHERE login = :login');
        $sth->execute(['login' => $this->log]);

        if (!empty($sth->fetchAll())) {
            $sth = null;
            header("Location: /?uniq=false&$this->error_code=true");
            die();
        }
    }


    // проверяем имеется ли такой логин в бд
    public function checkLogin(): void
    {
        $sth = $this->conn->prepare('SELECT id FROM users WHERE login = :login');
        $sth->execute(['login' => $this->log]);

        if(empty($sth->fetchAll())){
            header("Location: /?login=false&$this->error_code=true");
            die();
        }
    }
}