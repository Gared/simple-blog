<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;

class ShowLoginController implements SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string
    {
        $pageName = 'Login';
        ob_start();
        include(__DIR__ . '/../View/login.php');
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        include(__DIR__ . '/../View/main.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}