<?php

use App\Livewire\Component;
use App\Services\TestimonialService;
use Livewire\Attributes\Lazy;

new #[Lazy] class extends Component
{
    public object $testimonials;

    public function mount(): void
    {
        $service = new TestimonialService;
        $this->testimonials = $service->index(orderBy: 'id', sortBy: 'desc', limit: 6, paginate: false);
    }
};
?>

@placeholder
    <section class="py-5">
        <div class="container-md py-5">
            <div class="d-grid gap-4">
                <div class="text-center">
                    <div class="placeholder-glow">
                        <span class="placeholder col-4 col-sm-2 col-xl-1"></span>
                    </div>
                    <div class="placeholder-glow">
                        <span class="placeholder col-10 col-xl-6"></span>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col" wire:key="testimonial-{{ $i }}">
                            <div class="card card-body h-100">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                    <span class="placeholder col-10"></span>
                                    <span class="placeholder col-8"></span>
                                </div>
                                <div class="placeholder-glow mt-3">
                                    <span class="placeholder col-6"></span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endplaceholder

<div>
    @if ($testimonials->isNotEmpty())
        <section class="py-5">
            <div class="container-md py-5">
                <div class="d-grid gap-4">
                    <div class="text-center">
                        <p class="lead mb-0 text-uppercase text-success">{{ trans('home.testimonials.sub_title') }}</p>
                        <h2 class="display-6 fw-medium">{{ trans('home.testimonials.title') }}</h2>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($testimonials as $testimonial)
                            <div class="col" wire:key="testimonial-{{ $testimonial->id }}">
                                <div class="card h-100 border-0 shadow-sm rounded-4">
                                    <div class="card-body d-flex flex-column p-4">
                                        <span class="fas fa-quote-left fa-fw fa-2x text-success-emphasis opacity-50 mb-3"></span>

                                        <p class="card-text flex-grow-1">{{ $testimonial->word }}</p>

                                        <div class="mt-3">
                                            <div class="fw-semibold">{{ $testimonial->name }}</div>
                                            @if ($testimonial->job || $testimonial->company)
                                                <div class="small text-success">
                                                    {{ collect([$testimonial->job, $testimonial->company])->filter()->implode(', ') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
