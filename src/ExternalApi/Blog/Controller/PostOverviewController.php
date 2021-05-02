<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\BusinessDomain\UseCase\QueryHandler\LoadPostsQueryHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;

class PostOverviewController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        $postsQueryHandler = new LoadPostsQueryHandler();
        $posts = $postsQueryHandler->execute();

        $pageName = 'Posts overview';

        ob_start();
        include(__DIR__ . '/../View/posts.php');
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        include(__DIR__ . '/../View/main.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}