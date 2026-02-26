<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        Area::create(['district_id' => 1, 'name' => 'Berawa']);
        Area::create(['district_id' => 1, 'name' => 'Batu Bolong / Echo Beach']);
        Area::create(['district_id' => 1, 'name' => 'Padonan / Babakan']);
        Area::create(['district_id' => 1, 'name' => 'Cepaka / Kaba-Kaba']);

        Area::create(['district_id' => 2, 'name' => 'Beach Side']);
        Area::create(['district_id' => 2, 'name' => 'Tumbak Bayuh / Tiying Tutul']);

        Area::create(['district_id' => 4, 'name' => 'Nusa Dua']);
        Area::create(['district_id' => 4, 'name' => 'Uluwatu']);

        Area::create(['district_id' => 5, 'name' => 'Batu Belig']);
        Area::create(['district_id' => 5, 'name' => 'Oberoi']);
        Area::create(['district_id' => 5, 'name' => 'Petinteget']);
        Area::create(['district_id' => 5, 'name' => 'Seminyak Beach']);
        Area::create(['district_id' => 5, 'name' => 'Others']);
    }
}
