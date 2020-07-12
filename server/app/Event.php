<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model {
    /**
     * Get competition.
     *
     * @return BelongsTo
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class, '_competition_id');
    }

    /**
     * Get competitor 1.
     *
     * @return BelongsTo
     */
    public function competitor1()
    {
        return $this->belongsTo(Competitor::class, '_competitor1_id');
    }

    /**
     * Get competitor 2.
     *
     * @return BelongsTo
     */
    public function competitor2()
    {
        return $this->belongsTo(Competitor::class, '_competitor2_id');
    }

    /**
     * Get location.
     *
     * @return BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class, '_location_id');
    }

    /**
     * Get sport.
     *
     * @return BelongsTo
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class, '_sport_id');
    }
}