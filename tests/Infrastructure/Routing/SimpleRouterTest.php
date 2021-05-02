<?php

declare(strict_types=1);

namespace StefanBlogTest\Infrastructure\Routing;

use Exception;
use PHPUnit\Framework\TestCase;
use StefanBlog\ExternalApi\Blog\Controller\PostOverviewController;
use StefanBlog\Infrastructure\Routing\SimpleRouter;

class SimpleRouterTest extends TestCase
{
    public function testRoutingException(): void
    {
        self::expectException(Exception::class);

        $request = [
            'REQUEST_URI' => '/',
            'REQUEST_METHOD' => 'GET',
        ];

        $router = new SimpleRouter($request, []);
        $router->doRouting();
    }

    public function testRouting(): void
    {
        $request = [
            'REQUEST_URI' => '',
            'REQUEST_METHOD' => 'GET',
        ];

        $controllerMock = $this->createMock(PostOverviewController::class);

        $router = new SimpleRouter($request, []);
        $router->addController('#/?#', 'GET', get_class($controllerMock));
        self::assertTrue($router->doRouting());
    }
}
