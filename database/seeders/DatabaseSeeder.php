<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            // PermissionSeeder::class,
            NewPermissionSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,
            ModelProfileSeeder::class,
            VolunteerSeeder::class,
            EventSeeder::class,
            SponsorshipTypesTableSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
        ]);
    }
}
