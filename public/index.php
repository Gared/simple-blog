<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use StefanBlog\Infrastructure\Routing\SimpleRouter;

session_start();

$router = new SimpleRouter($_SERVER, $_REQUEST);
$router->addController('#^/?$#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\PostOverviewController::class);
$router->addController('#^/post/([A-Za-z0-9-]+)$#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\PostController::class);
$router->addController('#^/login$#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\ShowLoginController::class);
$router->addController('#^/login$#', 'POST', \StefanBlog\ExternalApi\Blog\Controller\LoginController::class);
$router->addController('#^/logout$#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\LogoutController::class);
$router->addController('#^/admin$#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\AdminController::class);
$router->doRouting();