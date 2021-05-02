<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use Exception;
use StefanBlog\BusinessDomain\UseCase\Query\LoginQuery;
use StefanBlog\BusinessDomain\UseCase\QueryHandler\LoginQueryHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;
use StefanBlog\Infrastructure\Exception\RedirectException;

class LoginController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        $loginQueryHandler = new LoginQueryHandler();
        $loginQuery = new LoginQuery($request['REQUEST_DATA']['username'], $request['REQUEST_DATA']['password']);
        $user = $loginQueryHandler->execute($loginQuery);

        if ($user === null) {
            throw new Exception('login failed');
        }

        throw new RedirectException('/admin');
    }
}