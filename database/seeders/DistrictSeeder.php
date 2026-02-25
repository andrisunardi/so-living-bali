<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        District::create(['name' => 'Canggu']);
        District::create(['name' => 'Pererenan']);
        District::create(['name' => 'Seseh / Cemagi']);
        District::create(['name' => 'Bukit']);
        District::create(['name' => 'Seminyak']);
        District::create(['name' => 'Umalas']);
        District::create(['name' => 'Kerobokan']);
    }
}
