<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use StefanBlog\BusinessDomain\Model\Post;

class LoadPostsQueryHandler
{
    public function execute(): array
    {
        return [
            new Post('Hello world', 'This is the first post'),
        ];
    }
}