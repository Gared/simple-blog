<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use PDO;
use StefanBlog\BusinessDomain\Model\Post;
use StefanBlog\BusinessDomain\Repository\PostRepository;
use StefanBlog\BusinessDomain\Repository\UserRepository;
use StefanBlog\BusinessDomain\UseCase\Query\LoadPostQuery;
use StefanBlog\Infrastructure\Database\DatabasePdoFactory;

class LoadPostQueryHandler
{
    public function execute(LoadPostQuery $query): ?Post
    {
        $pdo = DatabasePdoFactory::create();
        $postRepository = new PostRepository(
            $pdo
        );

        $userRepository = new UserRepository(
            $pdo
        );

        $post = $postRepository->find($query->getSlug());
        if ($post === null) {
            return null;
        }

        $post->user = $userRepository->findById($post->user_id);
        return $post;
    }
}