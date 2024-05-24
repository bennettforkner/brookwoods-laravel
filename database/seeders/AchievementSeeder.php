<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'scoresheet_id' => 1,
                'award_id' => 1,
                'date' => '2024-08-01'
            ],
            [
                'scoresheet_id' => 1,
                'award_id' => 2,
                'date' => '2024-07-04'
            ],
            [
                'scoresheet_id' => 1,
                'award_id' => 3,
                'date' => '2024-06-07'
            ],
            [
                'scoresheet_id' => 2,
                'award_id' => 1,
                'date' => '2024-08-01'
            ],
            [
                'scoresheet_id' => 3,
                'award_id' => 1,
                'date' => '2024-08-01'
            ],
            [
                'scoresheet_id' => 3,
                'award_id' => 2,
                'date' => '2024-07-04'
            ]
        ];

        foreach ($achievements as $achievement) {
            \App\Models\Achievement::create($achievement);
        }
    }
}
