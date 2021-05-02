<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use StefanBlog\BusinessDomain\Repository\PostRepository;
use StefanBlog\Infrastructure\Database\DatabasePdoFactory;

class LoadPostsQueryHandler
{
    public function execute(): array
    {
        $postRepository = new PostRepository(
            DatabasePdoFactory::create()
        );

        return $postRepository->findAll();
    }
}