<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
