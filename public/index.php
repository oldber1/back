<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

$router->get('/', function () {
    return "Welcome to My Framework!";
});

$router->get('/about', function () {
    return "This is the About page.";
});

$router->resolve();
