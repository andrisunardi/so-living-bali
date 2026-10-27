@props([
    'property' => null,
])

@php($images = $property->images)
@php($imageCount = $images->count())
@php($hasVideoTour = filled($property->video_tour))
@php($hasFloorPlan = filled($property->floor_plan))
@php($remainingImages = $imageCount - 5)

<div class="row g-3">
    <div class="col-lg-4 col-md-6">
        <div class="ratio ratio-4x3">
            @if ($hasVideoTour || $hasFloorPlan)
                <div class="d-flex gap-3">
                    @if ($hasVideoTour)
                        <a draggable="false" href="{{ $property->video_tour }}" target="_blank" rel="noopener noreferrer"
                            class="btn btn-light border d-flex flex-column justify-content-center align-items-center text-success flex-fill rounded-pill">
                            <span class="fas fa-circle-play fa-fw fs-4"></span>
                            <span class="small fw-semibold text-uppercase mt-2">{{ trans('property.video_tour') }}</span>
                        </a>
                    @endif

                    @if ($hasFloorPlan)
                        <a draggable="false" href="{{ $property->floor_plan }}" target="_blank" rel="noopener noreferrer"
                            class="btn btn-light border d-flex flex-column justify-content-center align-items-center text-success flex-fill rounded-pill">
                            <span class="fas fa-ruler-combined fa-fw fs-4"></span>
                            <span class="small fw-semibold text-uppercase mt-2">{{ trans('property.floor_plan') }}</span>
                        </a>
                    @endif
                </div>
            @else
                <a draggable="false" role="button" class="d-block" data-bs-toggle="modal" data-bs-target="#sale-gallery">
                    <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
                        <img draggable="false" loading="lazy" decoding="async"
                            class="object-fit-cover user-select-none w-100 h-100"
                            src="{{ $property->image?->image_url ?? asset('images/placeholder.png') }}"
                            alt="{{ trans('property.property') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                            onerror="this.onerror=null; this.src='/images/placeholder.png';" />
                    </div>
                </a>
            @endif
        </div>
    </div>

    @for ($i = 0; $i < 5; $i++)
        <div class="col-lg-4 col-md-6">
            @isset($images[$i])
                <a draggable="false" role="button" class="position-relative d-block" data-bs-toggle="modal"
                    data-bs-target="#sale-gallery"
                    onclick="setTimeout(() => document.getElementById('sale-gallery-image-{{ $i }}')?.scrollIntoView({ behavior: 'smooth' }), 300)">
                    <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
                        <img draggable="false" loading="lazy" decoding="async"
                            class="object-fit-cover user-select-none pe-none w-100 h-100"
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
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden bg-body-tertiary">
                    <img draggable="false" loading="lazy" decoding="async"
                        class="object-fit-cover user-select-none pe-none w-100 h-100"
                        src="{{ asset('images/placeholder.png') }}"
                        alt="{{ trans('property.property') }} - {{ trans('property.image') }} - {{ $property->name }} - {{ config('constants.meta.title') }}" />
                </div>
            @endisset
        </div>
    @endfor
</div>

@if ($imageCount > 0)
    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal"
            data-bs-target="#sale-gallery">
            <span class="fas fa-table-cells fa-fw"></span>
            {{ trans('property.view_all_photos') }} ({{ $imageCount }})
        </button>
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
