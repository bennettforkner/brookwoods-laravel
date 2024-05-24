<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Enums\AwardDifficultyLevel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Award extends Model
{
    use HasFactory;

    protected $casts = [
        'difficulty_level' => AwardDifficultyLevel::class,
    ];

    protected function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    protected function achievers_this_year(): HasManyThrough
    {
        return $this->hasManyThrough(Person::class, Achievement::class)
            ->whereYear('achievements.created_at', now()->year);
    }

    protected function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
