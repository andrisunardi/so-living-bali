<?php

use App\Livewire\Component;
use App\Services\FaqService;
use Livewire\Attributes\Lazy;

new #[Lazy] class extends Component {
    public string $subTitle = '';

    public string $title = '';

    public string $description = '';

    public object $faqs;

    public function mount(): void
    {
        $service = new FaqService();
        $this->faqs = $service->index(isActive: [true], orderBy: 'question', sortBy: 'asc', paginate: false);
    }
};
?>

@placeholder
    <section class="py-5 bg-white placeholder-glow">
        <div class="container-md py-5">
            <div class="d-flex flex-column gap-4">
                <div>
                    @if ($subTitle)
                        <div>
                            <p class="lead mb-1 placeholder col-2 col-lg-1"></p>
                        </div>
                    @endif
                    @if ($title)
                        <div>
                            <h1 class="display-6 fw-medium placeholder col-12 col-lg-9 col-xl-7 placeholder-lg"></h1>
                        </div>
                    @endif
                    @if ($description)
                        <div>
                            <p class="small text-muted placeholder col-11 col-lg-8 col-xl-6"></p>
                        </div>
                    @endif
                </div>

                <div class="accordion" id="faqs">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="accordion-item" wire:key="faq-{{ $i }}">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-{{ $i }}" aria-expanded="false"
                                    aria-controls="faq-{{ $i }}">
                                    <span class="placeholder col-11"></span>
                                </button>
                            </h2>

                            <div id="faq-{{ $i }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div>
                                        <span class="placeholder col-11"></span>
                                    </div>
                                    <div>
                                        <span class="placeholder col-10"></span>
                                    </div>
                                    <div>
                                        <span class="placeholder col-9"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endplaceholder

<section class="py-5 bg-white">
    <div class="container-md py-5">
        <div class="d-flex flex-column gap-4">
            <div class="text-start">
                @if ($subTitle)
                    <p class="lead mb-0">{{ trans('home.faqs.sub_title') }}</p>
                @endif
                @if ($title)
                    <h1 class="display-6 fw-medium">{{ trans('home.faqs.title') }}</h1>
                @endif
                @if ($description)
                    <p class="small text-muted">{{ trans('home.faqs.description') }}</p>
                @endif
            </div>

            <div class="accordion" id="faqs">
                @foreach ($faqs as $faq)
                    <div class="accordion-item" wire:key="faq-{{ $faq->id }}">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="faq-{{ $faq->id }}">
                                {{ $faq->translate_question }}
                            </button>
                        </h2>

                        <div id="faq-{{ $faq->id }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}">
                            <div class="accordion-body">
                                {!! $faq->translate_answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
