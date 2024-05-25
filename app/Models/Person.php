<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender'
    ];

    protected function scoresheets(): HasMany
    {
        return $this->hasMany(Scoresheet::class);
    }

    protected function achievements(): HasManyThrough
    {
        return $this->hasManyThrough(Achievement::class, Scoresheet::class);
    }
}
