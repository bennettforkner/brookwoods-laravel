<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Factories\PersonFactory;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Person::factory(20)->create();
    }
}
