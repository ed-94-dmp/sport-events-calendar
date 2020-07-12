<?php

header("Access-Control-Allow-Origin: http://localhost:8080");
header("Content-Type: application/json; charset=UTF-8");

require_once 'init.php';

use Router\Router;
use Router\Request;
use App\Controllers\Api\V1\EventController;
use Validator\IndexEventsValidator;

$router = new Router(new Request);

$router->get('/api/v1/events', function ($request) {
    return (new EventController())->index($request);
}, IndexEventsValidator::class);

