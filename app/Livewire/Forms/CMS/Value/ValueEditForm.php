<?php

namespace App\Livewire\Forms\CMS\Value;

use App\Models\Value;
use App\Services\ValueService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ValueEditForm extends Form
{
    public Value $value;

    public string $title = '';

    public string $title_id = '';

    public string $title_zh = '';

    #[Validate('required|string|min:1|max:100')]
    public string $short_description = '';

    #[Validate('required|string|min:1|max:100')]
    public string $short_description_id = '';

    #[Validate('required|string|min:1|max:100')]
    public string $short_description_zh = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $description = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $description_id = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $description_zh = '';

    #[Validate('required|string|min:1|max:50')]
    public string $icon = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Value $value): void
    {
        $this->value = $value;
        $this->title = $value->title;
        $this->title_id = $value->title_id;
        $this->title_zh = $value->title_zh;
        $this->short_description = $value->short_description;
        $this->short_description_id = $value->short_description_id;
        $this->short_description_zh = $value->short_description_zh;
        $this->description = $value->description;
        $this->description_id = $value->description_id;
        $this->description_zh = $value->description_zh;
        $this->icon = $value->icon;
        $this->is_active = $value->is_active;
    }

    public function rules(): array
    {
        return [
            'title' => "required|string|min:1|max:50|unique:values,title,{$this->value->id}",
            'title_id' => "required|string|min:1|max:50|unique:values,title_id,{$this->value->id}",
            'title_zh' => "required|string|min:1|max:50|unique:values,title_zh,{$this->value->id}",
        ];
    }

    public function submit(Value $value): Value
    {
        return (new ValueService)->update(value: $value, data: $this->validate());
    }
}
