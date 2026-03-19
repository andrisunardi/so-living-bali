<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            OauthSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,

            DistrictSeeder::class,
            AreaSeeder::class,

            ContactSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
        ]);
    }
}
