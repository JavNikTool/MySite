<?php

namespace core\user\authorization;
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
        $this->hash = $this->getHash(); // получаем хэш из базы соответствующий указанному логину
    }


    private function getHash(): mixed
    {
        $sth = $this->conn->prepare("SELECT password FROM users WHERE login = :login");
        $sth->execute(['login' => $this->login]);

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    // проверяем имеется ли такой юзер в базе
    public function checkUser(): void
    {
        if(!empty($this->hash)) {

            $hash = $this->hash['password'];
            $sth = $this->conn->prepare('SELECT id FROM users where login = :login and password = :password');

            $sth->execute([
                'login' => $this->login,
                'password' => $hash
            ]);

            // обязательно проверяем соответствует ли вытащенный из базы хэш паролю, который ввел пользователь
            if (!empty($sth->fetch(\PDO::FETCH_ASSOC)) && password_verify($this->password, $hash)) {

                $_SESSION['login'] = $this->login;
                $_SESSION['password'] = $hash;
                header('Location: /');
                die();

            }else {
                header('Location: /?auth=false&auth_err=true');
                die();
            }
        }else {
           header('Location: /?auth=false&auth_err=true');
            die();
        }
    }
}