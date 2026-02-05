<?php

namespace App\Livewire\CMS\Property;

use App\Enums\Property\PropertyStatus;
use App\Livewire\Component;
use App\Livewire\Forms\CMS\Property\PropertyEditForm;
use App\Models\Property;
use App\Services\UserService;
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

    public function getUsers(): object
    {
        return (new UserService)->index(
            roleName: 'Agent',
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getPropertyStatuses(): array
    {
        return PropertyStatus::cases();
    }

    public function render(): View
    {
        return view('livewire.cms.property.edit', [
            'users' => $this->getUsers(),
            'propertyStatuses' => $this->getPropertyStatuses(),
        ]);
    }
}
