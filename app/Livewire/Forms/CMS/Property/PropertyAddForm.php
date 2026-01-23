<?php

namespace App\Livewire\Forms\CMS\Property;

use App\Models\Property;
use App\Services\PropertyService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PropertyAddForm extends Form
{
    #[Validate('required|string|min:1|max:10|unique:properties,code')]
    public string $code = '';

    #[Validate('required|string|min:1|max:50')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100')]
    public string $address = '';

    public function submit(): Property
    {
        return (new PropertyService)->create(data: $this->validate());
    }
}
