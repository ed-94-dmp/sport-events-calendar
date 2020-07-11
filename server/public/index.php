<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'init.php';

use Router\Router;
use Router\Request;
use App\Controllers\Api\V1\EventController;

$router = new Router(new Request);

$router->get('/api/v1/events', function ($request) {
    return (new EventController())->index($request);
});

