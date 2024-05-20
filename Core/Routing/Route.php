<?php

namespace Core\Routing;

use HttpMethod;

class Route
{
    private HttpMethod $httpMethod;
    private string $pattern;
    private string $controllerClass;
    private string $actionMethod;
    private array $args;

}

