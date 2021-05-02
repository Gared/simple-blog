<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\CommandHandler;

use StefanBlog\BusinessDomain\Model\Post;
use StefanBlog\BusinessDomain\Repository\PostRepository;
use StefanBlog\BusinessDomain\UseCase\Command\CreatePostCommand;

class CreatePostCommandHandler
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute(CreatePostCommand $command)
    {
        $post = new Post();
        $post->title = $command->getTitle();
        $post->content = $command->getContent();
        $post->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $command->getTitle())));
        $post->user_id = $command->getUserId();

        $this->postRepository->save($post);
    }
}