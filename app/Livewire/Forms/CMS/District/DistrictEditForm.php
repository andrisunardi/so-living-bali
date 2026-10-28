<?php

namespace App\Livewire\Forms\CMS\District;

use App\Models\District;
use App\Services\DistrictService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DistrictEditForm extends Form
{
    public District $district;

    public string $name = '';

    #[Validate('nullable|string|max:65535')]
    public ?string $description = null;

    #[Validate('nullable|string|max:65535')]
    public ?string $description_id = null;

    #[Validate('nullable|string|max:65535')]
    public ?string $description_fr = null;

    #[Validate('required|boolean')]
    public bool $is_show = true;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(District $district): void
    {
        $this->district = $district;
        $this->name = $district->name;
        $this->description = $district->description;
        $this->description_id = $district->description_id;
        $this->description_fr = $district->description_fr;
        $this->is_show = $district->is_show;
        $this->is_active = $district->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:50|unique:districts,name,{$this->district->id}",
        ];
    }

    public function submit(District $district): District
    {
        return (new DistrictService)->update(district: $district, data: $this->validate());
    }
}
