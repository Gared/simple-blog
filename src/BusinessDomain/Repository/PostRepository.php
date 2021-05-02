<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\Repository;

use PDO;
use StefanBlog\BusinessDomain\Model\Post;
use StefanBlog\BusinessDomain\Model\User;

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
        $stmt = $this->pdo->query('SELECT id, slug, title, content FROM post ORDER BY post.created_at DESC');

        return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    public function find(string $slug): ?Post
    {
        $prepareStatement = $this->pdo->prepare('SELECT id, slug, title, content, user_id FROM post WHERE slug=:slug');
        $prepareStatement->bindParam(':slug', $slug);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, Post::class);

        $post = $prepareStatement->fetch();
        if ($post === null) {
            return null;
        }

        return $post;
    }

    public function save(Post $post): void
    {
        $prepareStatement = $this->pdo->prepare('INSERT INTO post (title, content, slug, user_id) VALUES (?, ?, ?, ?)');
        $prepareStatement->execute([$post->title, $post->content, $post->slug, $post->user_id]);
    }
}