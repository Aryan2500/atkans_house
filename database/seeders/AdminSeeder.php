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
            'name' => 'Siddharth',
            'firstName' => 'Siddharth',
            'lastName' => 'Atkans',
            'email' => 'user1@gmail.com',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'role' => 'user',
            'role_id' => 3,
        ]);

        User::create([
            'name' => 'Neelam',
            'firstName' => 'Neelam',
            'lastName' => ' ',
            'email' => 'user4@gmail.com',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'role' => 'user',
            'role_id' => 3,
        ]);

        User::create([
            'name' => 'Abc',
            'firstName' => 'Def',
            'lastName' => 'Abc',
            'email' => 'user2@gmail.com',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'role' => 'user',
            'role_id' => 3,
        ]);

        User::create([
            'name' => 'efg',
            'firstName' => 'efg',
            'lastName' => 'efg',
            'email' => 'user3@gmail.com',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'role' => 'user',
            'role_id' => 3,
        ]);
    }
}
