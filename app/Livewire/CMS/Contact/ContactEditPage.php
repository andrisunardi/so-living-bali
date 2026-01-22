<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Contact\ContactEditForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;

class ContactEditPage extends Component
{
    public ContactEditForm $form;

    public Contact $contact;

    public function mount(Contact $contact): void
    {
        $this->contact = $contact;
        $this->form->set(contact: $contact);
    }

    public function resetFields(): void
    {
        $this->form->set(contact: $this->contact);
    }

    public function submit(): void
    {
        $this->form->submit(contact: $this->contact);

        // $this->flash('success', trans('index.edit').' '.trans('index.success'), [
        //     'html' => trans('index.contact').' '.trans('index.has_been_successfully_edited'),
        // ]);

        $this->redirect(route('cms.contact.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.contact.edit');
    }
}
