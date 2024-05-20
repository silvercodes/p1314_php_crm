<?php

use App\Controllers\AuthController;
use Core\Routing\Router;

Router::get('registration', AuthController::class, 'registration');
Router::post('registration', AuthController::class, 'signUp');

Router::get('web/test/([0-9]+)/users/(\w+)', AuthController::class, 'signUp');
