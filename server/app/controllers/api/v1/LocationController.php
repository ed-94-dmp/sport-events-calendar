<?php

namespace App\Controllers\Api\V1;

use App\Location;

class LocationController
{
    /**
     * Returns list of locations
     *
     * @return string
     */
    function index()
    {
        return Location::with(['city', 'city.state', 'city.state.country'])
            ->get()
            ->toJson();
    }
}