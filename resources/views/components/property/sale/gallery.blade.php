@props([
    'property' => null,
])

@php($images = $property->images)
@php($imageCount = $images->count())
@php($remainingImages = $imageCount - 5)

<div class="row g-3">
    <div class="col-lg-6">
        <a draggable="false" role="button" class="d-block h-100" data-bs-toggle="modal"
            data-bs-target="#sale-gallery">
            <div class="ratio ratio-4x3 h-100 rounded-4 overflow-hidden">
                <img draggable="false" loading="lazy" decoding="async"
                    class="slb-card-img user-select-none w-100 h-100"
                    src="{{ $property->image?->image_url ?? asset('images/placeholder.png') }}"
                    alt="{{ trans('property.property') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                    onerror="this.onerror=null; this.src='/images/placeholder.png';" />
            </div>
        </a>
    </div>
    <div class="col-lg-6">
        <div class="row g-3">
            @for ($i = 1; $i <= 4; $i++)
                <div class="col-6">
                    @isset($images[$i])
                        <a draggable="false" role="button" class="position-relative d-block" data-bs-toggle="modal"
                            data-bs-target="#sale-gallery"
                            onclick="setTimeout(() => document.getElementById('sale-gallery-image-{{ $i }}')?.scrollIntoView({ behavior: 'smooth' }), 300)">
                            <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
                                <img draggable="false" loading="lazy" decoding="async"
                                    class="slb-card-img user-select-none pe-none w-100 h-100"
                                    src="{{ $images[$i]->image_url ?? asset('images/placeholder.png') }}"
                                    alt="{{ trans('property.property') }} - {{ trans('property.image') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                                    onerror="this.onerror=null; this.src='/images/placeholder.png';" />
                            </div>

                            @if ($i === 4 && $remainingImages > 0)
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-4"></div>

                                <div
                                    class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center">
                                    <div class="fw-bold fs-4">+{{ $remainingImages }}</div>
                                    <div class="small">{{ trans('property.more_images') }}</div>
                                </div>
                            @endif
                        </a>
                    @else
                        <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
                            <img draggable="false" loading="lazy" decoding="async"
                                class="slb-card-img user-select-none pe-none w-100 h-100"
                                src="{{ asset('images/placeholder.png') }}"
                                alt="{{ trans('property.property') }} - {{ trans('property.image') }} - {{ $property->name }} - {{ config('constants.meta.title') }}" />
                        </div>
                    @endisset
                </div>
            @endfor
        </div>
    </div>
</div>

@if ($imageCount > 0 || filled($property->video_tour) || filled($property->floor_plan))
    <div class="mt-3 d-flex flex-wrap gap-2">
        @if ($imageCount > 0)
            <button type="button" class="btn btn-light-slb rounded-pill" data-bs-toggle="modal"
                data-bs-target="#sale-gallery">
                <span class="fas fa-images fa-fw"></span>
                View all photos
            </button>
        @endif

        @if (filled($property->video_tour))
            <a draggable="false" class="btn btn-light-slb rounded-pill" href="{{ $property->video_tour }}"
                target="_blank" rel="noopener noreferrer">
                <span class="fas fa-circle-play fa-fw"></span>
                {{ trans('property.video_tour') }}
            </a>
        @endif

        @if (filled($property->floor_plan))
            <a draggable="false" class="btn btn-light-slb rounded-pill" href="{{ $property->floor_plan }}"
                target="_blank" rel="noopener noreferrer">
                <span class="fas fa-ruler-combined fa-fw"></span>
                {{ trans('property.floor_plan') }}
            </a>
        @endif
    </div>
@endif

@teleport('body')
    <div class="modal fade" id="sale-gallery" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">
                        {{ $property->code }} - {{ $property->name }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" style="scroll-behavior:smooth;">
                    <div class="d-grid gap-4">
                        @foreach ($images as $key => $propertyImage)
                            <div>
                                <img draggable="false" loading="lazy" decoding="async"
                                    class="img-fluid w-100 h-100 rounded"
                                    id="sale-gallery-image-{{ $key }}"
                                    src="{{ $propertyImage->image_url ?? asset('images/placeholder.png') }}"
                                    alt="{{ trans('property.property') }} - {{ $propertyImage->name }} - {{ config('constants.meta.title') }}"
                                    onerror="this.onerror=null; this.src='/images/placeholder.png';" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endteleport
