<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Arun',
            'firstName' => 'Arun',
            'lastName' => 'Kumar',
            'email' => 'user@gmail.com',
            'gender'=> 'Male',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'role' => 'user',
            'role_id' => 3,
        ]);
    }
}
