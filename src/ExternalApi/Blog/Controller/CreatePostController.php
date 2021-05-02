<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\BusinessDomain\Repository\PostRepository;
use StefanBlog\BusinessDomain\UseCase\Command\CreatePostCommand;
use StefanBlog\BusinessDomain\UseCase\CommandHandler\CreatePostCommandHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;
use StefanBlog\Infrastructure\Database\DatabasePdoFactory;
use StefanBlog\Infrastructure\Exception\RedirectException;

class CreatePostController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        if (!isset($_SESSION['user_id'])) {
            throw new RedirectException('/login');
        }
        $postRepository = new PostRepository(DatabasePdoFactory::create());
        $createPostCommandHandler = new CreatePostCommandHandler($postRepository);
        $postQuery = new CreatePostCommand(
            $request['REQUEST_DATA']['title'],
            $request['REQUEST_DATA']['text'],
            $_SESSION['user_id']
        );
        $createPostCommandHandler->execute($postQuery);

        throw new RedirectException('/admin');
    }
}