<?php

namespace App\Models;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    protected function attended_sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class, 'people_sessions')
            ->orderBy('start_at', 'desc');
    }
}
