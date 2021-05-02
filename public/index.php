<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use StefanBlog\Infrastructure\Routing\SimpleRouter;

// do routing
var_dump($_SERVER);

$router = new SimpleRouter($_SERVER);
$router->addController('#/?#', 'GET', \StefanBlog\ExternalApi\Blog\Controller\PostOverviewController::class);
$router->doRouting();