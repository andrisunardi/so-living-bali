<?php

namespace Database\Seeders;

use App\Models\GuideCategory;
use Illuminate\Database\Seeder;

class GuideCategorySeeder extends Seeder
{
    public function run(): void
    {
        GuideCategory::create(['name' => 'Rental Advice']);
        GuideCategory::create(['name' => 'Area Guides']);
        GuideCategory::create(['name' => 'Living In Bali']);
    }
}
