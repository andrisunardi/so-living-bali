<?php

namespace App\Livewire\Forms\CMS\Testimonial;

use App\Models\Testimonial;
use App\Services\TestimonialService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TestimonialAddForm extends Form
{
    #[Validate('required|string|min:1|max:100')]
    public string $name = '';

    #[Validate('nullable|string|min:1|max:100')]
    public ?string $job = '';

    #[Validate('nullable|string|min:1|max:100')]
    public ?string $company = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $word = '';

    public function submit(): Testimonial
    {
        return (new TestimonialService)->create(data: $this->validate());
    }
}
