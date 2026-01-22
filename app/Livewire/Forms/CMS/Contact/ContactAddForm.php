<?php

namespace App\Livewire\Forms\CMS\Contact;

use App\Models\Contact;
use App\Services\ContactService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactAddForm extends Form
{
    #[Validate('required|string|min:20|max:20|unique:contacts,code')]
    public string $code = '';

    #[Validate('required|string|min:1|max:50')]
    public string $name = '';

    #[Validate('required|string|min:1|max:50')]
    public string $company = '';

    #[Validate('required|email:rfc,dns|min:1|max:50')]
    public string $email = '';

    #[Validate('required|string|min:1|max:20')]
    public string $phone = '';

    public function submit(): Contact
    {
        return (new ContactService)->create(data: $this->validate());
    }
}
