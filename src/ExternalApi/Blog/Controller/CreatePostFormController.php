<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;

class CreatePostFormController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        $pageName = 'Create post';
        ob_start();
        include(__DIR__ . '/../View/admin_create_post.php');
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        include(__DIR__ . '/../View/admin.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}