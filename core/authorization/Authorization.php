<?php

namespace core\Authorization;
class Authorization
{
    private ?string $login = null;
    private ?string $password = null;
    private ?\PDO $conn = null;

    private mixed $hash = null;

    public function __construct($login, $password, $conn)
    {
        $this->login = $login;
        $this->password = $password;
        $this->conn = $conn;
        $this->hash = $this->getHash();
    }


    private function getHash(): mixed
    {
        $sth = $this->conn->prepare("SELECT password FROM users WHERE login = :login");
        $sth->execute(['login' => $this->login]);

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    public function checkUser(): void
    {
        if(!empty($this->hash)) {

            $hash = $this->hash['password'];
            $sth = $this->conn->prepare('SELECT id FROM users where login = :login and password = :password');

            $sth->execute([
                'login' => $this->login,
                'password' => $hash
            ]);

            if (count($sth->fetch(\PDO::FETCH_ASSOC)) > 0 && password_verify($this->password, $hash)) {

                $_SESSION['login'] = $this->password;
                $_SESSION['password'] = $hash;
                header('Location: /');

            }else {
                header('Location: /?auth=false&auth_err=true');
            }
        }else {
           header('Location: /?auth=false&auth_err=true');
        }
    }
}