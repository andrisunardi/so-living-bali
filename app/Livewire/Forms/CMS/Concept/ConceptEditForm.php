<?php

namespace App\Livewire\Forms\CMS\Concept;

use App\Models\Concept;
use App\Services\ConceptService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ConceptEditForm extends Form
{
    public Concept $concept;

    public string $title = '';

    public string $title_id = '';

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

    public function set(Concept $concept): void
    {
        $this->concept = $concept;
        $this->title = $concept->title;
        $this->title_id = $concept->title_id;
        $this->title_zh = $concept->title_zh;
        $this->description = $concept->description;
        $this->description_id = $concept->description_id;
        $this->description_zh = $concept->description_zh;
        $this->icon = $concept->icon;
        $this->is_active = $concept->is_active;
    }

    public function rules(): array
    {
        return [
            'title' => "required|string|min:1|max:50|unique:concepts,title,{$this->concept->id}",
            'title_id' => "required|string|min:1|max:50|unique:concepts,title_id,{$this->concept->id}",
            'title_zh' => "required|string|min:1|max:50|unique:concepts,title_zh,{$this->concept->id}",
        ];
    }

    public function submit(Concept $concept): Concept
    {
        return (new ConceptService)->update(concept: $concept, data: $this->validate());
    }
}
