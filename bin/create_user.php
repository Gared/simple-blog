<?php

declare(strict_types=1);

use StefanBlog\BusinessDomain\Repository\UserRepository;
use StefanBlog\BusinessDomain\UseCase\CommandHandler\CreateUserCommandHandler;
use StefanBlog\ExternalApi\System\Command\CreateUserConsoleCommand;
use StefanBlog\Infrastructure\Database\DatabasePdoFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$options = getopt("u:p:l:");

$userRepository = new UserRepository(DatabasePdoFactory::create());
$createUserCommandHandler = new CreateUserCommandHandler($userRepository);
$createUserCommand = new CreateUserConsoleCommand($createUserCommandHandler);
$createUserCommand->execute($options);