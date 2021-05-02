<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Routing;

class SimpleRouter
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';

    private string $requestUri;
    private string $method;

    public function __construct(
        string $requestUri,
        string $method
    ) {
        $this->requestUri = $requestUri;
        $this->method = $method;
    }

    public function doRouting()
    {
        var_dump($this->requestUri);
        switch ($this->requestUri) {
            case '/':
            case '':
                if ($this->method === self::METHOD_GET) {
                    var_dump('render blog');
                }
                break;
        }
    }
}