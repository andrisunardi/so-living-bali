<?php

namespace App\Livewire\Components\Home;

use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyType;
use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class HomeForm extends Component
{
    public string $bedroom = '';

    public string $type = '';

    public function changeBedroom(string $value = ''): void
    {
        $this->bedroom = $value;
    }

    public function changeType(string $value = ''): void
    {
        $this->type = $value;
    }

    public function getPropertyBedrooms(): array
    {
        return PropertyBedroom::cases();
    }

    public function getPropertyTypes(): array
    {
        return PropertyType::cases();
    }

    public function render(): View
    {
        return view('livewire.components.home.form', [
            'propertyBedrooms' => $this->getPropertyBedrooms(),
            'propertyTypes' => $this->getPropertyTypes(),
        ]);
    }
}
