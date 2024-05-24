<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $awards = [
            [
                'name' => 'Beginner Sailing',
                'activity_id' => 2, // 'Sailing'
                'description' => 'Beginner Sailing Reqs',
                'status' => 'active',
                'order' => 1,
                'difficulty_level' => 'beginner'
            ],
            [
                'name' => 'Intermediate Sailing',
                'activity_id' => 2, // 'Sailing'
                'description' => 'Intermediate Sailing Reqs',
                'status' => 'active',
                'order' => 2,
                'difficulty_level' => 'intermediate'
            ],
            [
                'name' => 'Advanced Sailing',
                'activity_id' => 2, // 'Sailing'
                'description' => 'Advanced Sailing Reqs',
                'status' => 'active',
                'order' => 3,
                'difficulty_level' => 'advanced'
            ],
            [
                'name' => 'Expert Sailing',
                'activity_id' => 2, // 'Sailing'
                'description' => 'Expert Sailing Reqs',
                'status' => 'active',
                'order' => 4,
                'difficulty_level' => 'expert'
            ]
        ];

        foreach ($awards as $award) {
            \App\Models\Award::create($award);
        }
    }
}
