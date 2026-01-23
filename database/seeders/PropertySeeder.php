<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create([
            'code' => 'ABCDEFGHIJ',
            'name' => 'PT. Bali Real Estate',
            'address' => 'Canggu Denpasar Bali',
        ]);

        Property::factory()->count(50)->create();
    }
}
