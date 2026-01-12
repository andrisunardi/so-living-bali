<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'contact_id' => null,
            'name' => 'Andri Sunardi',
            'company' => 'DIW.co.id',
            'email' => 'account@andrisunardi.com',
            'phone' => '6282298089363',
        ]);
    }
}
