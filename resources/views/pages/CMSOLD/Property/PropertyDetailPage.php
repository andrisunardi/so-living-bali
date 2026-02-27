<?php

namespace App\Livewire\CMS\Property;

use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Contracts\View\View;

class PropertyDetailPage extends Component
{
    public Property $property;

    public function mount(Property $property): void
    {
        $this->property = $property;
    }

    public function delete(): void
    {
        (new PropertyService)->delete(property: $this->property);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.property').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.property.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.property.detail');
    }
}
