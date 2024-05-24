<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Scoresheet extends Model
{
    use HasFactory;

    protected function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    protected function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    protected function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    protected function highest_achievement(): HasOne
    {
        return $this->hasOne(Achievement::class)
            ->leftJoin('awards', 'achievements.award_id', '=', 'awards.id')
            ->orderBy('awards.order', 'desc')
            ->limit(1);
    }
}
