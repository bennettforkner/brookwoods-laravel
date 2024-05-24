<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoresheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scoresheets = [
            [
                'person_id' => 1,
                'activity_id' => 1,
                'created_at' => '2024-08-01'
            ],
            [
                'person_id' => 2,
                'activity_id' => 1,
                'created_at' => '2024-07-04'
            ],
            [
                'person_id' => 3,
                'activity_id' => 1,
                'created_at' => '2024-06-07'
            ]
        ];

        foreach ($scoresheets as $scoresheet) {
            \App\Models\Scoresheet::create($scoresheet);
        }
    }
}
