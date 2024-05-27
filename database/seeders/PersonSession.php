<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSession extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = \App\Models\Person::all();
        $sessions = \App\Models\Session::all();

        $people->each(function ($person) use ($sessions) {
            $sessionCount = rand(1, 4);
            $personSessions = $sessions->random($sessionCount);
            $personSessions->each(function ($session) use ($person) {
                DB::table('people_sessions')->insert([
                    'person_id' => $person->id,
                    'session_id' => $session->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
        });
    }
}
