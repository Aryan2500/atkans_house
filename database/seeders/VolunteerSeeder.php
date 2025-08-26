<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Volunteer::factory()->count(20)->create();
    }
}
