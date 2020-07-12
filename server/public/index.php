<?php

header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

require_once 'init.php';

use Router\Router;
use Router\Request;

use App\Controllers\Api\V1\EventController;
use App\Controllers\Api\V1\SportController;
use App\Controllers\Api\V1\LocationController;
use App\Controllers\Api\V1\CompetitionController;
use App\Controllers\Api\V1\CompetitorController;

use Validator\IndexEventsValidator;
use Validator\CreateEventsValidator;

$router = new Router(new Request);

$router->get('/api/v1/events', function($request) {
    return (new EventController())->index($request);
}, IndexEventsValidator::class);

$router->post('/api/v1/events', function($request) {
    return (new EventController())->store($request);
}, CreateEventsValidator::class);

$router->get('/api/v1/sports', function() {
    return (new SportController())->index();
});

$router->get('/api/v1/locations', function() {
    return (new LocationController())->index();
});

$router->get('/api/v1/competitions', function() {
    return (new CompetitionController())->index();
});

$router->get('/api/v1/competitors', function() {
    return (new CompetitorController())->index();
});

