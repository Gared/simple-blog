<?php

declare(strict_types=1);

namespace StefanBlog\BusinessDomain\UseCase\CommandHandler;

class LogoutCommandHandler
{
    public function execute(): void
    {
        session_destroy();
    }
}