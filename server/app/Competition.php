<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    /**
     * Get events.
     *
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class, '_competition_id');
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