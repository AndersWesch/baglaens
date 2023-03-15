<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pass extends Model
{
    use HasFactory;

    /**
     * Get the tumbler
     */
    public function tumbler(): BelongsTo
    {
        return $this->belongsTo(Tumbler::class, 'tumbler_id', 'id');
    }

    /**
     * Get the tumbler
     */
    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }
}
