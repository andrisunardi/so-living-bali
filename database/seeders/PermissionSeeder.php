<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'property'])->assignRole('Admin', 'Agent');
        Permission::create(['name' => 'property.add'])->assignRole('Admin', 'Agent');
        Permission::create(['name' => 'property.edit'])->assignRole('Admin', 'Agent');
        Permission::create(['name' => 'property.delete'])->assignRole('Admin');
        Permission::create(['name' => 'property.detail'])->assignRole('Admin', 'Agent');

        Permission::create(['name' => 'contact'])->assignRole('Admin');
        Permission::create(['name' => 'contact.add'])->assignRole('Admin');
        Permission::create(['name' => 'contact.edit'])->assignRole('Admin');
        Permission::create(['name' => 'contact.delete'])->assignRole('Admin');
        Permission::create(['name' => 'contact.detail'])->assignRole('Admin');

        Permission::create(['name' => 'area'])->assignRole('Admin');
        Permission::create(['name' => 'area.add'])->assignRole('Admin');
        Permission::create(['name' => 'area.edit'])->assignRole('Admin');
        Permission::create(['name' => 'area.delete'])->assignRole('Admin');
        Permission::create(['name' => 'area.detail'])->assignRole('Admin');

        Permission::create(['name' => 'district'])->assignRole('Admin');
        Permission::create(['name' => 'district.add'])->assignRole('Admin');
        Permission::create(['name' => 'district.edit'])->assignRole('Admin');
        Permission::create(['name' => 'district.delete'])->assignRole('Admin');
        Permission::create(['name' => 'district.detail'])->assignRole('Admin');

        // ACCESS
        Permission::create(['name' => 'permission'])->assignRole('Admin');
        Permission::create(['name' => 'permission.add'])->assignRole('Admin');
        Permission::create(['name' => 'permission.edit'])->assignRole('Admin');
        Permission::create(['name' => 'permission.delete'])->assignRole('Admin');
        Permission::create(['name' => 'permission.detail'])->assignRole('Admin');

        Permission::create(['name' => 'role'])->assignRole('Admin');
        Permission::create(['name' => 'role.add'])->assignRole('Admin');
        Permission::create(['name' => 'role.edit'])->assignRole('Admin');
        Permission::create(['name' => 'role.delete'])->assignRole('Admin');
        Permission::create(['name' => 'role.detail'])->assignRole('Admin');

        Permission::create(['name' => 'user'])->assignRole('Admin');
        Permission::create(['name' => 'user.add'])->assignRole('Admin');
        Permission::create(['name' => 'user.edit'])->assignRole('Admin');
        Permission::create(['name' => 'user.delete'])->assignRole('Admin');
        Permission::create(['name' => 'user.detail'])->assignRole('Admin');
    }
}
