<?php

namespace App\Livewire\Forms\CMS\Testimonial;

use App\Models\Testimonial;
use App\Services\TestimonialService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TestimonialEditForm extends Form
{
    public Testimonial $testimonial;

    #[Validate('required|string|min:1|max:100')]
    public string $name = '';

    #[Validate('nullable|string|min:1|max:100')]
    public ?string $job = '';

    #[Validate('nullable|string|min:1|max:100')]
    public ?string $company = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $word = '';

    public function set(Testimonial $testimonial): void
    {
        $this->testimonial = $testimonial;
        $this->name = $testimonial->name;
        $this->job = $testimonial->job;
        $this->company = $testimonial->company;
        $this->word = $testimonial->word;
    }

    public function submit(Testimonial $testimonial): Testimonial
    {
        return (new TestimonialService)->update(testimonial: $testimonial, data: $this->validate());
    }
}
