<?php

declare(strict_types=1);

namespace StefanBlogTest\Infrastructure\Routing;

use Exception;
use PHPUnit\Framework\TestCase;
use StefanBlog\Infrastructure\Routing\SimpleRouter;

class SimpleRouterTest extends TestCase
{
    public function testRoutingException(): void
    {
        self::expectException(Exception::class);

        $router = new SimpleRouter('/', 'GET');
        $router->doRouting();
    }

    public function testRouting(): void
    {
        $router = new SimpleRouter('/', 'GET');
        $router->addController('#/?#', 'GET', 'stdclass');
        self::assertTrue($router->doRouting());
    }
}
