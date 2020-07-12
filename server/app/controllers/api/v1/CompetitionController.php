<?php

namespace App\Controllers\Api\V1;

use App\Competition;

class CompetitionController
{
    /**
     * Returns list of competitions
     *
     * @return string
     */
    function index()
    {
        return Competition::all()->toJson();
    }
}