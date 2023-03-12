<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
