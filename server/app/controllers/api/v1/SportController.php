<?php

namespace App\Controllers\Api\V1;

use App\Sport;

class SportController
{
    /**
     * Returns list of sports
     *
     * @return string
     */
    function index()
    {
        return Sport::all()->toJson();
    }
}