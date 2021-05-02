<?php

declare(strict_types=1);

namespace StefanBlog\DataDomain\Entity;

class UserEntity
{
    public int $id;

    public string $name;

    public string $login;

    public string $password;

    public function getName(): string
    {
        return $this->name;
    }
}