<?php

namespace App\Livewire\CMS\Property;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Property\PropertyAddForm;
use Illuminate\Contracts\View\View;

class PropertyAddPage extends Component
{
    public PropertyAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.property').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.property.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.property.add');
    }
}
