<?php

namespace core\Authorization;
class Authorization
{
    private ?string $login = null;
    private ?string $password = null;
    private ?\PDO $conn = null;



    public function __construct($login, $password, $conn)
    {
        $this->login = $login;
        $this->password = $password;
        $this->conn = $conn;
    }


    public function getHash(): mixed
    {
        $sth = $this->conn->prepare("SELECT password FROM users WHERE login = :login");
        $sth->execute(['login' => $this->login]);

        return $sth->fetch(\PDO::FETCH_ASSOC)['password'];
    }

    public function checkUser()
    {
        $sth = $this->conn->prepare('SELECT id FROM users where login = :login and password = :password');

        $sth->execute([
            'login' => $this->login,
            'password' => $this->getHash()
        ]);

        if (count($sth->fetch(\PDO::FETCH_ASSOC)) > 0 && password_verify($this->password, $this->getHash())){
            $_SESSION['login'] = $this->password;
            $_SESSION['password'] = $this->getHash();
            header('Location: /');
        }else{
            header('Location: /?auth=false&auth_err=true');
        }
    }
}