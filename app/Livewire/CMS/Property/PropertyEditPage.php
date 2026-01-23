<?php

namespace App\Livewire\CMS\Property;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Property\PropertyEditForm;
use App\Models\Property;
use Illuminate\Contracts\View\View;

class PropertyEditPage extends Component
{
    public PropertyEditForm $form;

    public Property $property;

    public function mount(Property $property): void
    {
        $this->property = $property;
        $this->form->set(property: $property);
    }

    public function resetFields(): void
    {
        $this->form->set(property: $this->property);
    }

    public function submit(): void
    {
        $this->form->submit(property: $this->property);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.property').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.property.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.property.edit');
    }
}
