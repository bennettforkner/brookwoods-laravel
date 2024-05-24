<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'name' => 'Archery',
                'description' => 'Keep your hands at home!',
                'status' => 'active',
            ],
            [
                'name' => 'Sailing',
                'description' => 'You\'re wearing a life jacket to dinner.',
                'status' => 'active',
            ],
            [
                'name' => 'Riflery',
                'description' => 'Aim for the bullseye!',
                'status' => 'active',
            ],
        ];

        foreach ($activities as $activity) {
            \App\Models\Activity::create($activity);
        }
    }
}
