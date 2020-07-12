<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competitor extends Model {
    /**
     * Get home events.
     *
     * @return HasMany
     */
    public function homeEvents()
    {
        return $this->hasMany(Event::class, '_competitor1_id');
    }

    /**
     * Get away events.
     *
     * @return HasMany
     */
    public function awayEvents()
    {
        return $this->hasMany(Event::class, '_competitor2_id');
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

    /**
     * Get country.
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, '_country_id');
    }
}