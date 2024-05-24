<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Activity extends Model
{
    use HasFactory;

    protected function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    protected function achievers_this_year(): HasManyThrough
    {
        return $this->hasManyThrough(Achievement::class, Award::class)
            ->leftJoin('scoresheets', 'achievements.scoresheet_id', '=', 'scoresheets.id')
            ->leftJoin('people', 'scoresheets.person_id', '=', 'people.id')
            ->whereYear('achievements.date', now()->year)
            ->orderBy('people.first_name')
            ->orderBy('people.last_name')
            ->select('people.*')
            ->distinct();
    }
}
