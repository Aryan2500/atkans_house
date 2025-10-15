<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'admin',
            'description' => 'admin has all access',
        ]);
        $permssion_ids = [];

        $permissions = Permission::whereNot('group_id', null)->get();
        foreach ($permissions as $permission) {

            array_push($permssion_ids, $permission->id);
        }

        $role->permissions()->sync($permssion_ids);
    }
}
