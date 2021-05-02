<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\BusinessDomain\UseCase\QueryHandler\LoadPostsQueryHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;
use StefanBlog\Infrastructure\Exception\RedirectException;

class AdminController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        if (!isset($_SESSION['user_id'])) {
            throw new RedirectException('/login');
        }
        $postsQueryHandler = new LoadPostsQueryHandler();
        $posts = $postsQueryHandler->execute();

        $pageName = 'Admin area';

        ob_start();
        include(__DIR__ . '/../View/admin.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}