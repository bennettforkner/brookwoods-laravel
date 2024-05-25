<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Scoresheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scoresheets = Scoresheet::all();

        $scoresheets->each(function ($scoresheet) {

            $availableAwards = $scoresheet->activity->awards->sortBy('order');
            $awardCountToCreate = rand(0, $availableAwards->count());

            $achievementDate = $scoresheet->created_at;

            for ($i = 0; $i < $awardCountToCreate; $i++) {
                $achievementDate = $achievementDate->addDays(rand(0, (now()->diffInDays($achievementDate) - 1)));
                $award = $availableAwards[$i];
                Achievement::create([
                    'scoresheet_id' => $scoresheet->id,
                    'award_id' => $award->id,
                    'date' => $achievementDate
                ]);
            }
        });
    }
}
