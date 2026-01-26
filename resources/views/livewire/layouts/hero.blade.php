<div class="vh-100 position-relative">
    <div class="d-none d-sm-inline d-md-none d-lg-inline">
        <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
            <source src="{{ $videoDesktop }}" type="video/mp4">
        </video>
    </div>
    <div class="d-inline d-sm-none d-md-inline d-lg-none">
        <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
            <source src="{{ $videoMobile }}" type="video/mp4">
        </video>
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
    <div class="position-absolute top-50 start-50 translate-middle w-100 text-center text-white p-3 mt-sm-5 mt-md-auto">
        <h4 class="display-6 fw-bold">{{ $title }}</h4>
        <h1 class="display-3 fw-bold">{{ $subTitle }}</h1>
        <p class="lead">{!! $description !!}</p>
        <a draggable="false" href="{{ $buttonLink }}" class="btn btn-outlet rounded-5"
            @if ($isExternalLink) target="_blank" @else wire:navigate @endif>
            {{ $buttonName }}
        </a>
    </div>
</div>
