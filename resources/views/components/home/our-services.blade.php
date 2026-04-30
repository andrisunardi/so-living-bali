<?php

use App\Livewire\Component;
use App\Services\ServiceService;
use Livewire\Attributes\Lazy;

new #[Lazy] class extends Component {
    public object $services;

    public function mount(): void
    {
        $service = new ServiceService();
        $this->services = $service->all();
    }
};
?>

@placeholder
    <section class="py-5">
        <div class="container-md py-5">
            <div class="d-grid gap-4">
                <div class="text-center">
                    <div class="placeholder-glow">
                        <span class="placeholder col-6 placeholder-lg"></span>
                    </div>
                    <div class="placeholder-glow mt-2">
                        <span class="placeholder col-8"></span>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-3 justify-content-end g-4">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="placeholder-glow">
                                            <span class="placeholder rounded-circle"
                                                style="width: 60px; height: 60px; display: inline-block;"></span>
                                        </div>
                                    </div>
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-7 placeholder-lg"></span>
                                    </div>
                                    <div class="placeholder-glow mt-2">
                                        <span class="placeholder col-12"></span>
                                        <span class="placeholder col-8"></span>
                                    </div>
                                    <div class="mt-3">
                                        <div class="placeholder-glow">
                                            <span class="placeholder col-10"></span>
                                        </div>
                                        <div class="placeholder-glow mt-1">
                                            <span class="placeholder col-8"></span>
                                        </div>
                                        <div class="placeholder-glow mt-1">
                                            <span class="placeholder col-9"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 py-3">
                                    <div class="placeholder-glow">
                                        <span class="placeholder col-12 rounded-pill" style="height: 38px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="text-center mt-4">
                    <div class="placeholder-glow">
                        <span class="placeholder col-3 rounded" style="height: 38px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endplaceholder

<section class="py-5">
    <div class="container-md py-5">
        <div class="d-grid gap-4">
            <div class="text-center">
                <h1 class="display-6 fw-medium">{{ trans('home.our_services.title') }}</h1>
                <p class="small text-muted">{{ trans('home.our_services.description') }}</p>
            </div>

            <div class="row row-cols-1 row-cols-sm-3 justify-content-end g-4">
                @foreach ($services as $service)
                    <div class="col" wire:key="service-{{ $service['id'] }}">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="mb-4">
                                    <span class="fa-stack fa-xl">
                                        <i class="fas fa-circle fa-stack-2x fa-inverse text-light"></i>
                                        <i class="{{ $service['icon'] }} fa-stack-1x text-success"></i>
                                    </span>
                                </div>
                                <h5 class="card-title">{{ $service['name'] }}</h5>
                                <p class="card-text">{{ $service['description'] }}</p>
                                <ul>
                                    @foreach ($service['inclusions'] as $key => $inclusion)
                                        <li wire:key="inclusion-{{ $key }}">
                                            {{ $inclusion }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer bg-white border-0 py-3">
                                <a draggable="false" class="btn btn-outline-success rounded-pill w-100"
                                    href="https://api.whatsapp.com/send/?phone={{ config('constants.contact.whatsapp') }}&text=Hello, i know from your website solivingbali.com from our services on {{ $service['name'] }}"
                                    target="_blank">
                                    <span class="fab fa-whatsapp fa-fw"></span>
                                    {{ trans('home.our_services.request_a_service') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a draggable="false" class="btn btn-success" href="{{ route('service') }}" wire:navigate>
                    {{ trans('home.our_services.view_more') }}
                    <span class="fas fa-chevron-right fa-fw"></span>
                </a>
            </div>
        </div>
    </div>
</section>
