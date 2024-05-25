<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Person;
use App\Models\Scoresheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoresheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::all()->each(function ($person) {
            $allActivities = Activity::all();
            
            $allActivities->each(function ($activity) use ($person) {
                if (rand(0, 8) === 0) {
                    Scoresheet::create([
                        'activity_id' => $activity->id,
                        'person_id' => $person->id,
                        'created_at' => now()->subDays(rand(1, 365 * 5))
                    ]);
                }
            });
        });
    }
}
