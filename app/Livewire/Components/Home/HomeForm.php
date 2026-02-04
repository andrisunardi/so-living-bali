<?php

namespace App\Livewire\Components\Home;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Enums\Property\PropertyType;
use App\Enums\Property\PropertyBedroom;

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

    public function propertyBedrooms(): array
    {
        return PropertyBedroom::cases();
    }

    public function propertyTypes(): array
    {
        return PropertyType::cases();
    }

    public function render(): View
    {
        return view('livewire.components.home.form', [
            'propertyBedrooms' => $this->propertyBedrooms(),
            'propertyTypes' => $this->propertyTypes(),
        ]);
    }
}
