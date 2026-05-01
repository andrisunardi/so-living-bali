<?php

namespace App\Livewire\Forms\CMS\PropertyImage;

use App\Models\PropertyImage;
use App\Services\PropertyImageService;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class PropertyImageAddForm extends Form
{
    #[Validate('required|integer|exists:properties,id')]
    public ?int $property_id = null;

    public string $name = '';

    #[Validate('required|string|min:1|max:100')]
    public string $google_file_id = '';

    #[Validate('required|image|file|mimes:jpg,jpeg,png,gif,webp|max:12288')]
    public ?TemporaryUploadedFile $image = null;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:1',
                'max:50',
                Rule::unique('property_images', 'name')
                    ->where(
                        fn ($query) => $query->where('property_id', $this->property_id)
                    ),
            ],
        ];
    }

    public function submit(): PropertyImage
    {
        return (new PropertyImageService)->create(data: $this->validate());
    }
}
