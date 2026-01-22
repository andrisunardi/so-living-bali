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

        // $this->flash('success', trans('index.add').' '.trans('index.success'), [
        //     'html' => trans('index.affiliate').' '.trans('index.has_been_successfully_added'),
        // ]);

        $this->redirect(route('cms.contact.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.contact.add');
    }
}
