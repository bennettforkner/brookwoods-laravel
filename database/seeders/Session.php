<?php

namespace Database\Seeders;

use App\Models\Session as SessionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Session extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = [
            [
                'name' => 'July First Two-weeks',
                'code' => 'J1',
                'start_at' => '2024-06-26',
                'end_at' => '2024-07-09',
                'year' => 2024,
            ],
            [
                'name' => 'July Second Two-weeks',
                'code' => 'J2',
                'start_at' => '2024-07-10',
                'end_at' => '2024-07-23',
                'year' => 2024,
            ],
            [
                'name' => 'August First Two-weeks',
                'code' => 'A1',
                'start_at' => '2024-07-24',
                'end_at' => '2024-08-06',
                'year' => 2024,
            ],
            [
                'name' => 'August Second Two-weeks',
                'code' => 'A2',
                'start_at' => '2024-08-07',
                'end_at' => '2024-08-20',
                'year' => 2024,
            ]
        ];

        foreach ($sessions as $session) {
            SessionModel::create($session);
        }
    }
}
