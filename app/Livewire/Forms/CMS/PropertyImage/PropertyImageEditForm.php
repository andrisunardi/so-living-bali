<?php

namespace App\Livewire\Forms\CMS\PropertyImage;

use App\Models\PropertyImage;
use App\Services\PropertyImageService;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class PropertyImageEditForm extends Form
{
    public PropertyImage $propertyImage;

    #[Validate('required|integer|exists:properties,id')]
    public ?int $property_id = null;

    public string $name = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|image|file|mimes:jpg,jpeg,png,gif,webp|max:12288')]
    public ?TemporaryUploadedFile $image = null;

    public function set(PropertyImage $propertyImage): void
    {
        $this->propertyImage = $propertyImage;
        $this->property_id = $propertyImage->property_id;
        $this->name = $propertyImage->name;
        $this->description = $propertyImage->description;
    }

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
                    )
                    ->ignore($this->propertyImage->id),
            ],
        ];
    }

    public function submit(PropertyImage $propertyImage): PropertyImage
    {
        return (new PropertyImageService)->update(propertyImage: $propertyImage, data: $this->validate());
    }
}
