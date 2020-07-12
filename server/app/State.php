<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model {
    /**
     * Get cities.
     *
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class, '_state_id');
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