<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\Command;

class CreateUserCommand
{
    private string $username;
    private string $password;
    private string $login;

    public function __construct(string $username, string $login, string $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->login = $login;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getLogin(): string
    {
        return $this->login;
    }
}