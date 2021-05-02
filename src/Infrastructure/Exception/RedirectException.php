<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Exception;

use Exception;

class RedirectException extends Exception
{
    private string $redirectRoute;

    public function __construct(string $redirectRoute)
    {
        parent::__construct('Redirect');
        $this->redirectRoute = $redirectRoute;
    }

    public function getRedirectRoute(): string
    {
        return $this->redirectRoute;
    }
}