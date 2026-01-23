<?php

namespace App\Livewire\Forms\CMS\Property;

use App\Models\Property;
use App\Services\PropertyService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PropertyEditForm extends Form
{
    public Property $property;

    public string $code = '';

    #[Validate('required|string|min:1|max:50')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100')]
    public string $address = '';

    public function set(Property $property): void
    {
        $this->property = $property;
        $this->code = $property->code;
        $this->name = $property->name;
        $this->address = $property->address;
    }

    public function rules(): array
    {
        return [
            'code' => "required|string|min:1|max:10|unique:properties,code,{$this->property->id}",
        ];
    }

    public function submit(Property $property): Property
    {
        return (new PropertyService)->update(property: $property, data: $this->validate());
    }
}
