<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Routing;

class SimpleRouter
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';

    private string $requestUri;
    private string $method;
    private array $controllers = [];

    public function __construct(
        string $requestUri,
        string $method
    ) {
        $this->requestUri = $requestUri;
        $this->method = $method;
    }

    public function addController(
        string $requestUriRegex,
        string $method,
        string $controllerClass
    ): void {
        $this->controllers[$method][$requestUriRegex] = $controllerClass;
    }

    public function doRouting(): bool
    {
        foreach ($this->controllers as $method => $urls) {
            if ($method === $this->method) {
                foreach ($urls as $url => $controllerClass) {
                    if (preg_match($url, $this->requestUri)) {
                        $controller = new $controllerClass;
                        var_dump($controller);
                        return true;
                    }
                }
            }
        }

        throw new \Exception('no controller can handle this request');
    }
}