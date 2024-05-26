<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Providers\Visuals;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'order',
        'difficulty_level'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($activity) {
            $activity->color = '#' . Visuals::stringToColorCode($activity->name);
        });
    }

    protected function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    protected function achievements_this_year(): HasManyThrough
    {
        return $this->hasManyThrough(Achievement::class, Award::class)
            ->whereYear('achievements.date', now()->year)
            ->distinct();
    }
}
