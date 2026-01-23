<?php

namespace App\Livewire\Forms\CMS\Contact;

use App\Models\Contact;
use App\Services\ContactService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactEditForm extends Form
{
    public Contact $contact;

    public string $code = '';

    #[Validate('required|string|min:1|max:50')]
    public string $name = '';

    #[Validate('required|string|min:1|max:50')]
    public string $company = '';

    #[Validate('required|email:rfc,dns|min:1|max:50')]
    public string $email = '';

    #[Validate('required|string|min:1|max:20')]
    public string $phone = '';

    public function set(Contact $contact): void
    {
        $this->contact = $contact;
        $this->code = $contact->code;
        $this->name = $contact->name;
        $this->company = $contact->company;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
    }

    public function rules(): array
    {
        return [
            'code' => "required|string|min:20|max:20|unique:contacts,code,{$this->contact->id}",
        ];
    }

    public function submit(Contact $contact): Contact
    {
        return (new ContactService)->update(contact: $contact, data: $this->validate());
    }
}
