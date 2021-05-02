<?php

declare(strict_types=1);

use StefanBlog\BusinessDomain\Repository\UserRepository;
use StefanBlog\BusinessDomain\UseCase\CommandHandler\CreateUserCommandHandler;
use StefanBlog\ExternalApi\System\Command\CreateUserConsoleCommand;
use StefanBlog\Infrastructure\Database\DatabaseFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$options = getopt("u:p:l:", [], $blub);
var_dump($options);
var_dump($blub);

$userRepository = new UserRepository(DatabaseFactory::create());
$createUserCommandHandler = new CreateUserCommandHandler($userRepository);
$createUserCommand = new CreateUserConsoleCommand($createUserCommandHandler);
$createUserCommand->execute($options);