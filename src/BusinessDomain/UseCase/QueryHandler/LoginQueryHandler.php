<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use StefanBlog\DataDomain\Entity\UserEntity;
use StefanBlog\BusinessDomain\Repository\UserRepository;
use StefanBlog\BusinessDomain\UseCase\Query\LoginQuery;
use StefanBlog\Infrastructure\Database\DatabasePdoFactory;

class LoginQueryHandler
{
    public function execute(LoginQuery $query): ?UserEntity
    {
        $userRepository = new UserRepository(
            DatabasePdoFactory::create()
        );

        $user = $userRepository->find($query->getLogin());
        if ($user === null || !password_verify($query->getPassword(), $user->password)) {
            return null;
        }

        $_SESSION['user_id'] = $user->id;

        return $user;
    }
}