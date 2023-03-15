<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * Get the year of the event
     */
    public function getYearAttribute(): int
    {
        $date = new Carbon($this->date);
        return $date->format('Y');
    }

    /**
     * Get the country of the club
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * Get the city of the club
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * Get the cities of the country
     */
    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class);
    }
}
