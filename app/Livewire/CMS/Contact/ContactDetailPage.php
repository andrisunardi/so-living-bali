<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\Component;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;

class ContactDetailPage extends Component
{
    public Contact $contact;

    public function mount(Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function delete(Contact $contact): void
    {
        (new ContactService)->delete(contact: $contact);

        // $this->flash('success', trans('index.delete').' '.trans('index.success'), [
        //     'html' => trans('page.contact').' '.trans('index.has_been_successfully_deleted'),
        // ]);

        $this->redirect(route('cms.contact.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.contact.detail');
    }
}
