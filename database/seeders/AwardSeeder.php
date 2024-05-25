<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Award;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Activity::all()->each(function ($activity) {
            $awards = [
                [
                    'name' => 'Beginner ' . $activity->name,
                    'activity_id' => $activity->id,
                    'description' => 'Beginner ' . $activity->name . ' Reqs',
                    'status' => 'active',
                    'order' => 1,
                    'difficulty_level' => 'beginner'
                ],
                [
                    'name' => 'Intermediate ' . $activity->name,
                    'activity_id' => $activity->id,
                    'description' => 'Intermediate ' . $activity->name . ' Reqs',
                    'status' => 'active',
                    'order' => 2,
                    'difficulty_level' => 'intermediate'
                ],
                [
                    'name' => 'Advanced ' . $activity->name,
                    'activity_id' => $activity->id,
                    'description' => 'Advanced ' . $activity->name . ' Reqs',
                    'status' => 'active',
                    'order' => 3,
                    'difficulty_level' => 'advanced'
                ],
                [
                    'name' => 'Expert ' . $activity->name,
                    'activity_id' => $activity->id,
                    'description' => 'Expert ' . $activity->name . ' Reqs',
                    'status' => 'active',
                    'order' => 4,
                    'difficulty_level' => 'expert'
                ]
            ];

            foreach ($awards as $award) {
                Award::create($award);
            }
        });

    }
}
