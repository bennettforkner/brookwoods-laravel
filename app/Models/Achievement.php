<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected function scoresheet(): BelongsTo
    {
        return $this->belongsTo(Scoresheet::class);
    }

    protected function award(): BelongsTo
    {
        return $this->belongsTo(Award::class);
    }
}
