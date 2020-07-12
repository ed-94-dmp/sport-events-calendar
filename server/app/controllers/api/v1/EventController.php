<?php

namespace App\Controllers\Api\V1;

use App\Event;

class EventController
{
    /**
     * Returns list of events
     *
     * @param $request
     * @return string
     */
    function index($request)
    {
        $params = $request->getParams();

        $date = $params['date'];
        $page = $params['page'] ?? 1;
        $sportId = $params['sportId'];

        return Event::with([
            'competition',
            'competitor1',
            'competitor2',
            'location',
            'location.city',
            'location.city.state.country',
            'sport'
        ])
            ->when($date, function ($query) use ($date) {
                $query->whereDate('datetime', '=', $date);
            })
            ->when($sportId, function ($query) use ($sportId) {
                $query->where('_sport_id', '=', $sportId);
            })
            ->paginate(10, ['*'], 'page', $page)
            ->toJson();
    }
}