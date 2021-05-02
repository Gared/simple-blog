<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\BusinessDomain\UseCase\QueryHandler\LoadPostQueryHandler;
use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;

class PostController implements SimpleControllerInterface
{
    public function process(array $request): string
    {
        $postsQueryHandler = new LoadPostQueryHandler();
        $post = $postsQueryHandler->execute();

        if ($post === null) {
            throw new \Exception('not found');
        }

        $pageName = 'Post ' . $post->getTitle();
        ob_start();
        include(__DIR__ . '/../View/post.php');
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        include(__DIR__ . '/../View/main.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}