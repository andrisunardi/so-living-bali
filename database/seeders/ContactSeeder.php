<?php

namespace Database\Seeders;

use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyRentalType;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'code' => 'ABCDEFGHIJKLMNOPQRST',
            'name' => 'Andri Sunardi',
            'first_name' => 'Andri',
            'last_name' => 'Sunardi',
            'company' => 'DIW.co.id',
            'email' => 'account@andrisunardi.com',
            'phone' => '6282298089363',
            'area_id' => null,
            'bedroom' => PropertyBedroom::OneBedroom,
            'rental_type' => PropertyRentalType::Monthly,
            'message' => 'Test Message',
        ]);

        Contact::factory()->count(50)->create();
    }
}
