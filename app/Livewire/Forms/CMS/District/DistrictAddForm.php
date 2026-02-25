<?php

namespace App\Livewire\Forms\CMS\District;

use App\Models\District;
use App\Services\DistrictService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DistrictAddForm extends Form
{
    #[Validate('required|string|min:1|max:50|unique:districts,name')]
    public string $name = '';

    #[Validate('required|boolean')]
    public bool $is_show = true;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): District
    {
        return (new DistrictService)->create(data: $this->validate());
    }
}
