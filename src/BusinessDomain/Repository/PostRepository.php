<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\Repository;

use PDO;
use StefanBlog\BusinessDomain\Model\Post;

class PostRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Post[]
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT title, content FROM post');

        return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
    }
}