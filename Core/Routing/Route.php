<?php

namespace Core\Routing;


class Route
{
    private HttpMethod $httpMethod;
    private string $pattern;
    private string $controllerClass;
    private string $actionMethod;
    private array $args = [];
    private bool $withAuth = false;

    /**
     * @param HttpMethod $httpMethod
     * @param string $pattern
     * @param string $controllerClass
     * @param string $actionMethod
     */
    public function __construct(HttpMethod $httpMethod, string $pattern, string $controllerClass, string $actionMethod)
    {
        $this->httpMethod = $httpMethod;
        $this->pattern = $pattern;
        $this->controllerClass = $controllerClass;
        $this->actionMethod = $actionMethod;
    }

    public function withAuth()
    {
        $this->withAuth = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWithAuth(): bool
    {
        return $this->withAuth;
    }

    /**
     * @return HttpMethod
     */
    public function getHttpMethod(): HttpMethod
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param array $args
     */
    public function setArgs(array $args): void
    {
        $this->args = $args;
    }

    public function execute(): void {
        if (class_exists($this->controllerClass)) {
            $controller = new $this->controllerClass;

            call_user_func_array([$controller, $this->actionMethod], $this->args);
        }
    }
}

