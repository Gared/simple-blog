<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\QueryHandler;

use PDO;
use StefanBlog\BusinessDomain\Model\Post;
use StefanBlog\BusinessDomain\Repository\PostRepository;

class LoadPostQueryHandler
{
    private array $config;

    public function __construct()
    {
        $this->config = require_once(__DIR__ . '/../../../../config/database.php');
    }

    public function execute(): ?Post
    {
        $postRepository = new PostRepository(new PDO(
            $this->config['mysql']['dsn'],
            $this->config['mysql']['user'],
            $this->config['mysql']['password'])
        );

        return $postRepository->find(1);
    }
}