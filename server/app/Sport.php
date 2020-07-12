<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    /**
     * Get competitions.
     *
     * @return HasMany
     */
    public function competitions()
    {
        return $this->hasMany(Competition::class, '_sport_id');
    }

    /**
     * Get events.
     *
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class, '_sport_id');
    }
}