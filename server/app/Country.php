<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model {
    /**
     * Get states.
     *
     * @return HasMany
     */
    public function states()
    {
        return $this->hasMany(State::class, '_country_id');
    }

    /**
     * Get competitors.
     *
     * @return HasMany
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class, '_country_id');
    }
}