<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,

            DistrictSeeder::class,

            ContactSeeder::class,
            PropertySeeder::class,
        ]);
    }
}
