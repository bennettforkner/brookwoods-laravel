<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Providers\Visuals;
use App\Models\Activity;

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
                'slug' => 'archery',
            ],
            [
                'name' => 'Sailing',
                'description' => 'You\'re wearing a life jacket to dinner.',
                'status' => 'active',
                'slug' => 'sailing',
            ],
            [
                'name' => 'Riflery',
                'description' => 'Aim for the bullseye!',
                'status' => 'active',
                'slug' => 'riflery',
            ],
            [
                'name' => 'Canoeing',
                'description' => 'Paddle faster!',
                'status' => 'active',
                'slug' => 'canoeing',
            ],
            [
                'name' => 'Swimming',
                'description' => 'Don\'t forget to breathe!',
                'status' => 'active',
                'slug' => 'swimming',
            ],
            [
                'name' => 'Hiking',
                'description' => 'Don\'t forget your water bottle!',
                'status' => 'active',
                'slug' => 'hiking',
            ],
            [
                'name' => 'Fishing',
                'description' => 'Catch the big one!',
                'status' => 'active',
                'slug' => 'fishing',
            ],
            [
                'name' => 'Climbing',
                'description' => 'Don\'t look down!',
                'status' => 'active',
                'slug' => 'climbing',
            ],
            [
                'name' => 'Mountain Biking',
                'description' => 'Watch out for the trees!',
                'status' => 'active',
                'slug' => 'mountain-biking',
            ],
            [
                'name' => 'Kayaking',
                'description' => 'Paddle faster!',
                'status' => 'active',
                'slug' => 'kayaking',
            ],
            [
                'name' => 'Mountain Boarding',
                'description' => 'Don\'t forget your helmet!',
                'status' => 'active',
                'slug' => 'mountain-boarding',
            ],
            [
                'name' => 'Surfing',
                'description' => 'Hang ten!',
                'status' => 'active',
                'slug' => 'surfing',
            ],
            [
                'name' => 'Skateboarding',
                'description' => 'Don\'t forget your knee pads!',
                'status' => 'active',
                'slug' => 'skateboarding',
            ]
        ];

        foreach ($activities as $activity) {
            $activity['color'] = ('#' . Visuals::stringToColorCode($activity['name']));
            Activity::create($activity);
        }
    }
}
