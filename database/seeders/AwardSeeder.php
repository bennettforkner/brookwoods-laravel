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

        Activity::where('name', '<>', 'Archery')->each(function ($activity) {
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

        $archery = Activity::where('name', 'Archery')->first();

        /*
            Archery awards:
            Award Name	Code	Distance	Required Points
            Jr Yeoman	60@15	15 yds.	60
            Jr Yeoman w/ arrow	80@15	15 yds.	80
            Yeoman	100@15	15 yds.	100
            Jr. Bowman	60@20	20 yds.	60
            Jr. Bowman w/ arrow	80@20	20 yds.	80
            Bowman	100@20	20 yds.	100
            Bowman First Rank	130@20	20 yds.	130
            Bowman Sharpshooter	160@20	20 yds.	160
            Archer	100@30	30 yds.	100
            Archer First Rank	130@30	30 yds.	130
            Archer Sharpshooter	160@30	30 yds.	160
            Silverbow	100@40	40 yds.	100
            Silverbow First Rank	130@40	40 yds.	130
            Silverbow Sharpshooter	160@40	40 yds.	160
            American Archer	100@50	50 yds.	100
        */

        $archeryAwards = [
            [
                'name' => 'Jr. Yeoman',
                'short_name' =>'60@15',
                'activity_id' => $archery->id,
                'description' => 'Score 60 points shooting 30 arrows from 15 yards away from the target.',
                'status' => 'active',
                'order' => 1,
                'has_points' => true,
                'points' => '60'
            ],
            [
                'name' => 'Jr. Yeoman (with arrow)',
                'short_name' =>'80@15',
                'activity_id' => $archery->id,
                'description' => 'Score 80 points shooting 30 arrows from 15 yards away from the target.',
                'status' => 'active',
                'order' => 2,
                'has_points' => true,
                'points' => '80'
            ],
            [
                'name' => 'Yeoman',
                'short_name' =>'100@15',
                'activity_id' => $archery->id,
                'description' => 'Score 100 points shooting 30 arrows from 15 yards away from the target.',
                'status' => 'active',
                'order' => 3,
                'has_points' => true,
                'points' => '100'
            ],
            [
                'name' => 'Jr. Bowman',
                'short_name' =>'60@20',
                'activity_id' => $archery->id,
                'description' => 'Score 60 points shooting 30 arrows from 20 yards away from the target.',
                'status' => 'active',
                'order' => 4,
                'has_points' => true,
                'points' => '60'
            ],
            [
                'name' => 'Jr. Bowman (with arrow)',
                'short_name' =>'80@20',
                'activity_id' => $archery->id,
                'description' => 'Score 80 points shooting 30 arrows from 20 yards away from the target.',
                'status' => 'active',
                'order' => 5,
                'has_points' => true,
                'points' => '80'
            ],
            [
                'name' => 'Bowman',
                'short_name' =>'100@20',
                'activity_id' => $archery->id,
                'description' => 'Score 100 points shooting 30 arrows from 20 yards away from the target.',
                'status' => 'active',
                'order' => 6,
                'has_points' => true,
                'points' => '100'
            ],
            [
                'name' => 'Bowman First Rank',
                'short_name' =>'130@20',
                'activity_id' => $archery->id,
                'description' => 'Score 130 points shooting 30 arrows from 20 yards away from the target.',
                'status' => 'active',
                'order' => 7,
                'has_points' => true,
                'points' => '130'
            ],
            [
                'name' => 'Bowman Sharpshooter',
                'short_name' =>'160@20',
                'activity_id' => $archery->id,
                'description' => 'Score 160 points shooting 30 arrows from 20 yards away from the target.',
                'status' => 'active',
                'order' => 8,
                'has_points' => true,
                'points' => '160'
            ],
            [
                'name' => 'Archer',
                'short_name' =>'100@30',
                'activity_id' => $archery->id,
                'description' => 'Score 100 points shooting 30 arrows from 30 yards away from the target.',
                'status' => 'active',
                'order' => 9,
                'has_points' => true,
                'points' => '100'
            ],
            [
                'name' => 'Archer First Rank',
                'short_name' =>'130@30',
                'activity_id' => $archery->id,
                'description' => 'Score 130 points shooting 30 arrows from 30 yards away from the target.',
                'status' => 'active',
                'order' => 10,
                'has_points' => true,
                'points' => '130'
            ],
            [
                'name' => 'Archer Sharpshooter',
                'short_name' =>'160@30',
                'activity_id' => $archery->id,
                'description' => 'Score 160 points shooting 30 arrows from 30 yards away from the target.',
                'status' => 'active',
                'order' => 11,
                'has_points' => true,
                'points' => '160'
            ],
            [
                'name' => 'Silverbow',
                'short_name' =>'100@40',
                'activity_id' => $archery->id,
                'description' => 'Score 100 points shooting 30 arrows from 40 yards away from the target.',
                'status' => 'active',
                'order' => 12,
                'has_points' => true,
                'points' => '100'
            ],
            [
                'name' => 'Silverbow First Rank',
                'short_name' =>'130@40',
                'activity_id' => $archery->id,
                'description' => 'Score 130 points shooting 30 arrows from 40 yards away from the target.',
                'status' => 'active',
                'order' => 13,
                'has_points' => true,
                'points' => '130'
            ],
            [
                'name' => 'Silverbow Sharpshooter',
                'short_name' =>'160@40',
                'activity_id' => $archery->id,
                'description' => 'Score 160 points shooting 30 arrows from 40 yards away from the target.',
                'status' => 'active',
                'order' => 14,
                'has_points' => true,
                'points' => '160'
            ],
            [
                'name' => 'American Archer',
                'short_name' =>'100@50',
                'activity_id' => $archery->id,
                'description' => 'Score 100 points shooting 30 arrows from 50 yards away from the target.',
                'status' => 'active',
                'order' => 15,
                'has_points' => true,
                'points' => '100'
            ]
        ];

        foreach ($archeryAwards as $award) {
            Award::create($award);
        }
    }
}
