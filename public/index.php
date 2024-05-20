<?php

require_once '../vendor/autoload.php';

use Core\Application;

const ROOT = __DIR__ . '/..';

$app = new Application();
$app->run();
