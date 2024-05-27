<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'start_at',
        'end_at',
        'year',
    ];

    public function people()
    {
        return $this->belongsToMany(Person::class, 'people_sessions');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class)
            ->where('date', '>=', $this->start_at)
            ->where('date', '<=', $this->end_at);
    }
}
