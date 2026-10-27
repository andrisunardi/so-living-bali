@props([
    'property' => null,
])

@php($location = $property->area?->name ?? $property->district?->name)
@php($whatsappText = rawurlencode('Hello, I am interested in '.$property->name.' ('.$property->code.') on solivingbali.com'))

<div class="row g-4">
    <div class="col-lg-7 col-xl-8">
        <h1 class="fw-semibold">{{ $property->name }}</h1>

        <p class="text-body-secondary mb-3">
            @php($subtitle = collect([
                $property->bedroom?->description() ? $property->bedroom->description().' bedroom' : null,
                $property->type?->description(),
                $location,
                $property->ownership_type?->description(),
            ])->filter()->implode(' · '))
            {{ $subtitle }}
        </p>

        <div class="d-flex flex-wrap gap-2">
            @if ($property->code)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-code fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $property->code }}</span>
                </span>
            @endif

            @if ($location)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-location-dot fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $location }}</span>
                </span>
            @endif

            @if ($property->bedroom?->description())
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-bed fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $property->bedroom->description() }} Bedrooms</span>
                </span>
            @endif

            @if ($property->number_of_bathrooms)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-bath fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $property->number_of_bathrooms }} Bathrooms</span>
                </span>
            @endif

            @if ($property->building_size)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-ruler-combined fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $property->building_size }} m² building</span>
                </span>
            @endif

            @if ($property->land_size)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-vector-square fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $property->land_size }} m² land</span>
                </span>
            @endif
        </div>
    </div>

    <div class="col-lg-5 col-xl-4">
        <div class="card border shadow-sm rounded-4 position-sticky" style="top:1.5rem">
            <div class="card-body p-4">
                <div class="text-body-secondary small">Sale price</div>
                <div class="fs-3 fw-semibold text-success-emphasis">
                    {{ Str::currency($property->sale_price, $property->currency) }}
                </div>

                @if ($property->ownership_type?->description())
                    <span class="badge text-bg-success rounded-pill mt-2">
                        {{ $property->ownership_type->description() }}
                    </span>
                @endif

                <div class="d-grid gap-2 mt-4">
                    <a draggable="false" class="btn btn-success rounded-pill"
                        href="#enquiry"
                        onclick="document.getElementById('interest-more-information')?.click();">
                        <span class="fas fa-circle-info fa-fw"></span>
                        Request info
                    </a>
                    <a draggable="false" class="btn btn-dark rounded-pill"
                        href="#enquiry"
                        onclick="document.getElementById('interest-booking-a-viewing')?.click();">
                        <span class="fas fa-calendar-check fa-fw"></span>
                        Book a viewing
                    </a>
                    <a draggable="false" class="btn btn-outline-success rounded-pill"
                        href="https://api.whatsapp.com/send/?phone={{ Str::slug(config('constants.contact.whatsapp'), '') }}&text={{ $whatsappText }}"
                        target="_blank">
                        <span class="fab fa-whatsapp fa-fw"></span>
                        {{ trans('property.whatsapp') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
