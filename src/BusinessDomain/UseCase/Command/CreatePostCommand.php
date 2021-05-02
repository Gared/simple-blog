<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\Command;

class CreatePostCommand
{
    private string $title;
    private string $content;
    private int $userId;

    public function __construct(string $title, string $content, int $userId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}