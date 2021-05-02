<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use PDO;
use StefanBlog\BusinessDomain\Model\Post;
use StefanBlog\BusinessDomain\Repository\PostRepository;
use StefanBlog\BusinessDomain\UseCase\Query\LoadPostQuery;

class LoadPostQueryHandler
{
    private array $config;

    public function __construct()
    {
        $this->config = require_once(__DIR__ . '/../../../../config/database.php');
    }

    public function execute(LoadPostQuery $query): ?Post
    {
        $pdo = new PDO(
            $this->config['mysql']['dsn'],
            $this->config['mysql']['user'],
            $this->config['mysql']['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
        $postRepository = new PostRepository(
            $pdo
        );

        return $postRepository->find($query->getSlug());
    }
}