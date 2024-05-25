<?php

namespace Core;

require_once ROOT . '/config/app.php';
require_once ROOT . '/config/routes.php';
require_once ROOT . '/config/db.php';

use Core\Routing\Router;

class Application
{
    public function run() {
        $router = new Router();
        $router->run();
    }
}