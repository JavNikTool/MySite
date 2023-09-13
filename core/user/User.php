<?php

namespace core\user;
class User
{
    private ?array $properties = null;
    private \PDO|null $conn = null;

    public function __construct($login, $password, $conn)
    {
        $this->properties['login'] = $login;
        $this->properties['password'] = $password;
        $this->conn = $conn;
        $this->properties['hash'] = $this->getHash(); // получаем хэш из базы соответствующий указанному логину
        $this->properties['isAdmin'] = self::isAdmin();
    }

    // метод проверяет, является ли пользователь админом
    public function isAdmin(): bool {
        if(self::UserCheck()){
            $login = $this->properties['login'];
            $sth = $this->conn->query("SELECT admin FROM users WHERE login = '$login'");
            $isAdmin = $sth->fetch(\PDO::FETCH_ASSOC)['admin'];
            return $isAdmin;
        }else {
            return false;
        }

    }

    private function getHash(): mixed
    {
        $sth = $this->conn->prepare("SELECT password FROM users WHERE login = :login");
        $sth->execute(['login' => $this->properties['login']]);
        $arPass = $sth->fetch(\PDO::FETCH_ASSOC)['password'];
        return $arPass;
    }

    // метод проверяет, имеется ли в базе данных пользователь по указанному логину и паролю
    public function UserCheck(): bool
    {
        if(!empty($this->properties['hash'])) {

            $hash = $this->properties['hash'];
            $sth = $this->conn->prepare('SELECT id FROM users where login = :login and password = :password');

            $sth->execute([
                'login' => $this->properties['login'],
                'password' => $hash
            ]);

            // обязательно проверяем соответствует ли вытащенный из базы хэш паролю, который ввел пользователь
            if (!empty($sth->fetch(\PDO::FETCH_ASSOC)) && password_verify($this->properties['password'], $hash)) {
                return true;

            }else {
                return false;
            }
        }else {
           return false;
        }
    }
}