<?php

declare(strict_types=1);

namespace StefanBlog\ExternalApi\Blog\Controller;

use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;

class PostOverviewController implements SimpleControllerInterface
{
    public function process(array $request): string
    {
        return 'test';
    }
}