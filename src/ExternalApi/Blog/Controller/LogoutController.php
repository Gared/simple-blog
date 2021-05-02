<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\BusinessDomain\UseCase\CommandHandler\LogoutCommandHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;
use StefanBlog\Infrastructure\Exception\RedirectException;

class LogoutController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        $logoutCommandHandler = new LogoutCommandHandler();
        $logoutCommandHandler->execute();

        throw new RedirectException('/');
    }
}