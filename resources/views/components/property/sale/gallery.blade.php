@props([
    'property' => null,
])

@php($images = $property->images)
@php($imageCount = $images->count())
@php($remainingImages = $imageCount - 5)

<div class="row g-3">
    <div class="col-lg-6">
        <a draggable="false" role="button" class="d-block ratio ratio-4x3 rounded-4 overflow-hidden"
            data-bs-toggle="modal" data-bs-target="#sale-gallery">
            <img draggable="false" loading="lazy" decoding="async" class="object-fit-cover"
                src="{{ $images[0]->image_url ?? asset('images/placeholder.png') }}"
                alt="{{ trans('property.property') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                onerror="this.onerror=null; this.src='/images/placeholder.png';">
        </a>
    </div>

    <div class="col-lg-6">
        <div class="row row-cols-2 g-3">
            @for ($i = 1; $i <= 4; $i++)
                <div class="col">
                    @isset($images[$i])
                        <a draggable="false" role="button" class="d-block position-relative ratio ratio-4x3 rounded-4 overflow-hidden"
                            data-bs-toggle="modal" data-bs-target="#sale-gallery">
                            <img draggable="false" loading="lazy" decoding="async" class="object-fit-cover"
                                src="{{ $images[$i]->image_url ?? asset('images/placeholder.png') }}"
                                alt="{{ trans('property.property') }} - {{ trans('property.image') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                                onerror="this.onerror=null; this.src='/images/placeholder.png';">

                            @if ($i === 4 && $remainingImages > 0)
                                <span class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center bg-dark bg-opacity-50">
                                    <span class="fw-bold fs-4">+{{ $remainingImages }}</span>
                                    <span class="small">{{ trans('property.more_images') }}</span>
                                </span>
                            @endif
                        </a>
                    @else
                        <span class="d-block ratio ratio-4x3 rounded-4 overflow-hidden bg-body-tertiary"></span>
                    @endisset
                </div>
            @endfor
        </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-end gap-2 mt-3">
    @if (filled($property->video_tour))
        <a draggable="false" class="btn btn-outline-dark rounded-pill" href="{{ $property->video_tour }}"
            target="_blank" rel="noopener noreferrer">
            <span class="fas fa-circle-play fa-fw"></span>
            {{ trans('property.video_tour') }}
        </a>
    @endif

    @if (filled($property->floor_plan))
        <a draggable="false" class="btn btn-outline-dark rounded-pill" href="{{ $property->floor_plan }}"
            target="_blank" rel="noopener noreferrer">
            <span class="fas fa-ruler-combined fa-fw"></span>
            {{ trans('property.floor_plan') }}
        </a>
    @endif

    @if ($imageCount > 0)
        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal"
            data-bs-target="#sale-gallery">
            <span class="fas fa-table-cells fa-fw"></span>
            {{ trans('property.view_all_photos') }} ({{ $imageCount }})
        </button>
    @endif
</div>

@teleport('body')
    <div class="modal fade" id="sale-gallery" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5">{{ $property->code }} - {{ $property->name }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="d-grid gap-4">
                        @foreach ($images as $propertyImage)
                            <img draggable="false" loading="lazy" decoding="async" class="img-fluid rounded"
                                src="{{ $propertyImage->image_url ?? asset('images/placeholder.png') }}"
                                alt="{{ trans('property.property') }} - {{ $propertyImage->name }} - {{ config('constants.meta.title') }}"
                                onerror="this.onerror=null; this.src='/images/placeholder.png';">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endteleport
