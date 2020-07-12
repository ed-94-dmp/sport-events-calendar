<?php

namespace App\Controllers\Api\V1;

use App\Competitor;

class CompetitorController
{
    /**
     * Returns list of competitors
     *
     * @return string
     */
    function index()
    {
        return Competitor::all()->toJson();
    }
}