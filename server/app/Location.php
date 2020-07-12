<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model {
    /**
     * Get events.
     *
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class, '_location_id');
    }

    /**
     * Get city.
     *
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, '_city_id');
    }
}