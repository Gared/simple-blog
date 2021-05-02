<?php

declare(strict_types=1);

namespace StefanBlog\DataDomain\Entity;

class PostEntity
{
    public int $id;

    public string $title;

    public string $content;

    public string $slug;

    public UserEntity $user;

    public int $user_id;

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

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getExcerpt(): string
    {
        if (strlen($this->content) > 100) {
            return substr($this->content, 0, 97) . '...';
        }

        return $this->content;
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }
}