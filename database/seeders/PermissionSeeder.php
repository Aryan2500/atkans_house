<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = config('constant.permissions');
        $permssion_ids = [];
        foreach ($permissions as $perm) {

            $perm = Permission::create($perm);
            array_push($permssion_ids, $perm->id);
        }

        $role = Role::create([
            'name' => 'admin',
            'description' => 'admin has all access',
        ]);
        $role->permissions()->sync($permssion_ids);
    }
}
