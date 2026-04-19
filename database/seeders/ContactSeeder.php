<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'code' => 'ABCDEFGHIJKLMNOPQRST',
            'name' => 'Andri Sunardi',
            'company' => 'DIW.co.id',
            'email' => 'account@andrisunardi.com',
            'phone' => '6282298089363',
            'area_id' => null,
        ]);

        Contact::factory()->count(50)->create();
    }
}
