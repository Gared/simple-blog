<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\Model;

class User
{
    public int $id;

    public string $name;

    public function getName(): string
    {
        return $this->name;
    }
}