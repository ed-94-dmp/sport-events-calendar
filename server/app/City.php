<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model {
    /**
     * Get locations.
     *
     * @return HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class, '_city_id');
    }

    /**
     * Get state.
     *
     * @return BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class, '_state_id');
    }

    /**
     * Get competitors.
     *
     * @return HasMany
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class, '_city_id');
    }
}