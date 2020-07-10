<?php

require_once '../vendor/autoload.php';

Dotenv\Dotenv::createImmutable('../')->load();

use App\Database;

new Database();