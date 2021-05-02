<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\Repository;

use PDO;
use StefanBlog\BusinessDomain\Model\User;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(string $login): ?User
    {
        $prepareStatement = $this->pdo->prepare('SELECT id, name, password FROM user WHERE login=:login');
        $prepareStatement->bindParam(':login', $login);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, User::class);

        $user = $prepareStatement->fetch();
        if ($user === false) {
            return null;
        }

        return $user;
    }

    public function findById(int $id): ?User
    {
        $prepareStatement = $this->pdo->prepare('SELECT id, name FROM user WHERE id=:id');
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, User::class);

        $user = $prepareStatement->fetch();
        if ($user === false) {
            return null;
        }

        return $user;
    }

    public function save(User $user): void
    {
        $prepareStatement = $this->pdo->prepare('INSERT INTO user (name, login, password) VALUES (?, ?, ?)');
        $prepareStatement->execute([$user->name, $user->login, $user->password]);
    }
}