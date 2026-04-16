<?php

namespace App\Livewire\Forms\CMS\Concept;

use App\Models\Concept;
use App\Services\ConceptService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ConceptAddForm extends Form
{
    #[Validate('required|string|min:1|max:50|unique:concepts,title')]
    public string $title = '';

    #[Validate('required|string|min:1|max:50|unique:concepts,title_id')]
    public string $title_id = '';

    #[Validate('required|string|min:1|max:50|unique:concepts,title_zh')]
    public string $title_zh = '';

    #[Validate('required|string|min:1|max:100')]
    public string $description = '';

    #[Validate('required|string|min:1|max:100')]
    public string $description_id = '';

    #[Validate('required|string|min:1|max:100')]
    public string $description_zh = '';

    #[Validate('required|string|min:1|max:50')]
    public string $icon = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): Concept
    {
        return (new ConceptService)->create(data: $this->validate());
    }
}
