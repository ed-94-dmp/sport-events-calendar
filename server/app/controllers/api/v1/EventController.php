<?php

namespace App\Controllers\Api\V1;

use App\Event;

class EventController {
    /**
     * @param $request
     * @return string
     */
    function index($request) {
        $events = new Event();

        [$page, $date] = $request->getParams();

        return $events
            ->when($date, function($query) use ($date) {
                $query->whereDate('datetime', '=', $date);
            })
            ->paginate(5, ['*'], 'page', $page)
            ->toJson();
    }
}