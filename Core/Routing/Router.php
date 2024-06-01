<?php

namespace Core\Routing;

use Core\CookieManager;
use Exception;


class Router
{
    private static array $routes;

    public static function __callStatic(string $name, array $args) {
        $method = match($name) {
            'get' => HttpMethod::GET,
            'post' => HttpMethod::POST,

            default => null,
        };

        if ($method) {
            $route = new Route($method, $args[0], $args[1], $args[2]);  // TODO: validate args
            self::$routes[] = $route;

            return $route;
        }

        throw new Exception('Invalid route');                   // TODO: add custom exception
    }

    private function getUri(): string{
        if (! empty($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            return trim($uri, '/');
        }

        return '';
    }
    public function run() {
        $uri = $this->getUri();

        if (! $uri)
            header('Location: ' . HOME_PAGE);

        $method = $_SERVER['REQUEST_METHOD'];

        $args = [];

        /**@var Route $route */
        foreach (self::$routes as $route) {
            if ($route->getHttpMethod()->value === $method && preg_match("~{$route->getPattern()}~", $uri, $args)) {
                array_shift($args);

                $route->setArgs($args);

                if ($route->isWithAuth() && ! CookieManager::checkAuth()) {
                    header('Location: /login');
                    return;
                }

                $route->execute();
                return;
            }
        }

        require_once ROOT . '/App/views/static/404View.php';
    }
}