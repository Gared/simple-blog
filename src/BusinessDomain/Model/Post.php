<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\Model;

class Post
{
    private string $title;

    private string $content;

    public function __construct(
        string $title,
        string $content
    ) {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function getExcerpt(): string
    {
        if (strlen($this->content) > 100) {
            return substr($this->content, 0, 97) . '...';
        }

        return $this->content;
    }
}