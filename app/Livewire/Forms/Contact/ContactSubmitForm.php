<?php

namespace App\Livewire\Forms\Contact;

use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyRentalType;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactSubmitForm extends Form
{
    #[Validate('nullable|string|min:1|max:20')]
    public string $first_name = '';

    #[Validate('required|string|min:1|max:50')]
    public string $last_name = '';

    #[Validate('required|email:rfc,dns|min:1|max:50|unique:contacts,email')]
    public string $email = '';

    #[Validate('required|string|min:1|max:20|unique:contacts,phone')]
    public string $phone = '';

    #[Validate('required|integer|exists:areas,id')]
    public string $area_id = '';

    #[Validate(['required', 'integer', new Enum(PropertyBedroom::class)])]
    public ?int $property_bedroom = null;

    #[Validate(['required', 'integer', new Enum(PropertyRentalType::class)])]
    public ?int $property_rental_type = null;

    #[Validate('required|string|min:1|max:1000')]
    public string $message = '';

    public function submit(): Contact
    {
        return (new ContactService)->create(data: $this->validate());
    }
}
