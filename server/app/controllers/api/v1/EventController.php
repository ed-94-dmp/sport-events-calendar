<?php

namespace App\Controllers\Api\V1;

use App\Event;
use Ramsey\Uuid\Uuid;

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

    function store($request)
    {
        $params = $request->getParams();

        $event = new Event;
        $event->id = Uuid::uuid4();
        $event->_location_id = $params['locationId'];
        $event->_sport_id = $params['sportId'];
        $event->_competition_id = $params['competitionId'];
        $event->_competitor1_id = $params['competitor1Id'];
        $event->_competitor2_id = $params['competitor2Id'];
        $event->status = $params['status'];
        $event->datetime = $params['datetime'];
        $event->save();

        return $event;
    }
}