<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Permissiongroup;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (PERMISSIONS_GROUPS as $key => $g) {
            Permissiongroup::create([
                'name' => $g
            ]);
        }
    }
}
