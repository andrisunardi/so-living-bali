<?php

namespace App\Livewire\Components\Home;

use App\Enums\Property\PropertyType;
use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class HomeForm extends Component
{
    public function propertyTypes(): array
    {
        return PropertyType::cases();
    }

    public function render(): View
    {
        return view('livewire.components.home.form', [
            'propertyTypes' => $this->propertyTypes(),
        ]);
    }
}
