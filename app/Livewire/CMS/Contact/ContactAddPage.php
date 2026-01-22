<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Contact\ContactAddForm;
use Illuminate\Contracts\View\View;

class ContactAddPage extends Component
{
    public ContactAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.contact').' '.trans('message.has_been_successfully_addd'),
        ]);

        $this->redirect(route('cms.contact.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.contact.add');
    }
}
