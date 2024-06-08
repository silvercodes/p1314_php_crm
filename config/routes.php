<?php

use App\Controllers\AuthController;
use App\Controllers\WorkerController;
use Core\Routing\Router;

Router::get('registration', AuthController::class, 'renderRegistration');
Router::post('registration', AuthController::class, 'registration');

Router::get('login', AuthController::class, 'renderLogin');
Router::post('login', AuthController::class, 'login');

Router::get('logout', AuthController::class, 'logout')->withAuth();

Router::get('workers', WorkerController::class, 'index')->withAuth();

Router::get('api/workers/([0-9]+)', WorkerController::class, 'get')->withAuth();
Router::post('api/workers', WorkerController::class, 'create')->withAuth();


