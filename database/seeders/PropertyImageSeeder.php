<?php

namespace Database\Seeders;

use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    public function run(): void
    {
        PropertyImage::factory()->count(10)->create();
    }
}
