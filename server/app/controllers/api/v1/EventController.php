<?php

namespace App\Controllers\Api\V1;

use App\Event;

class EventController {
    /**
     * Returns list of events
     * @param $request
     * @return string
     */
    function index($request) {
        $params = $request->getParams();

        $date = $params['date'];
        $page = $params['page'] ?? 1;

        $events = new Event();
        return $events
            ->when($date, function($query) use ($date) {
                $query->whereDate('datetime', '=', $date);
            })
            ->paginate(5, ['*'], 'page', $page)
            ->toJson();
    }
}