<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\CommandHandler;

use StefanBlog\DataDomain\Entity\UserEntity;
use StefanBlog\BusinessDomain\Repository\UserRepository;
use StefanBlog\BusinessDomain\UseCase\Command\CreateUserCommand;

class CreateUserCommandHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserCommand $command)
    {
        $user = new UserEntity();
        $user->name = $command->getUsername();
        $user->login = $command->getLogin();
        $user->password = password_hash($command->getPassword(), PASSWORD_BCRYPT);

        $this->userRepository->save($user);
    }
}