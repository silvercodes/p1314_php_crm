<?php

use App\Controllers\AuthController;
use Core\Routing\Router;

Router::get('registration', AuthController::class, 'renderRegistration');
Router::post('registration', AuthController::class, 'registration');


