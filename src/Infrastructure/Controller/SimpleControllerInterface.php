<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Controller;

interface SimpleControllerInterface
{
    public function process(array $request, array $routeMatches): string;
}