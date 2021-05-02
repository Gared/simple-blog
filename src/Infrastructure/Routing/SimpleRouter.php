<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Routing;

use StefanBlog\Infrastructure\Controller\SimpleControllerInterface;
use StefanBlog\Infrastructure\Exception\RedirectException;

class SimpleRouter
{
    private string $requestUri;
    private string $method;
    private array $serverData;
    private array $controllers = [];
    private array $request;

    public function __construct(
        array $serverData,
        array $request
    ) {
        $this->serverData = $serverData;
        $this->requestUri = $serverData['REQUEST_URI'];
        $this->method = $serverData['REQUEST_METHOD'];
        $this->request = $request;
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
                    if (preg_match($url, $this->requestUri, $matches)) {
                        /** @var SimpleControllerInterface $controller */
                        $controller = new $controllerClass;
                        $requestData = array_merge($this->serverData, [
                            'REQUEST_DATA' => $this->request
                        ]);
                        try {
                            $text = $controller->process($requestData, $matches);
                            echo $text;
                        } catch (RedirectException $exception) {
                            echo '<meta http-equiv="refresh" content="0; url=' . $exception->getRedirectRoute() . '" />';
                        }
                        return true;
                    }
                }
            }
        }

        throw new \Exception('no controller can handle this request');
    }
}