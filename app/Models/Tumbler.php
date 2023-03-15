<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Carbon\Carbon;

class Tumbler extends Model
{
    use HasFactory;

    /**
     * Get a tumblers first and last name
     */
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the year of the tumblers birthday
     */
    public function getYearAttribute(): int
    {
        $date = new Carbon($this->birthday);
        return $date->format('Y');
    }

    /**
     * Get the country of the tumbler
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * The a tumblers clubs
     */
    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'club_tumbler', 'tumbler_id', 'club_id');
    }

    /**
     * Get a tumblers passes
     */
    public function passes(): HasMany
    {
        return $this->hasMany(Pass::class);
    }

    /**
     * Get all of the competition a tumbler has been to
     */
    public function competitions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Competition::class,
            Pass::class,
            'tumbler_id',
            'id',
            'id',
            'competition_id'
        )->distinct('competition_id')->with('event');
    }
}
