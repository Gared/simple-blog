<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\System\Command;

use StefanBlog\BusinessDomain\UseCase\Command\CreateUserCommand;
use StefanBlog\BusinessDomain\UseCase\CommandHandler\CreateUserCommandHandler;

class CreateUserConsoleCommand
{
    private CreateUserCommandHandler $createUserCommandHandler;

    public function __construct(CreateUserCommandHandler $createUserCommandHandler)
    {
        $this->createUserCommandHandler = $createUserCommandHandler;
    }

    public function execute(array $input): int
    {
        $createUserCommand = new CreateUserCommand($input['u'], $input['l'], $input['p']);
        $this->createUserCommandHandler->execute($createUserCommand);

        return 0;
    }
}