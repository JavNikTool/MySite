<?php


namespace core;
class User
{
    private ?int $id = null;
    private ?string $login = null;
    private ?string $password = null;

    public function __construct($id, $login, $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }
    public function getLogin() : string
    {
        return $this->login;
    }
    public function getPassword() : string
    {
        return $this->password;
    }
    public function getId() : int

    {
        return $this->id;
    }
}