@props([
    'property' => null,
])

@php
    use App\Enums\Property\PropertyOwnershipType;

    $location = $property->area?->name ?? $property->district?->name;
    $whatsappText = rawurlencode('Hello, I am interested in '.$property->name.' ('.$property->code.') on solivingbali.com');

    $isLeasehold = $property->ownership_type === PropertyOwnershipType::Leasehold;
    $isFreehold = $property->ownership_type === PropertyOwnershipType::Freehold;

    $leaseRemainingYears = null;
    if ($isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
        $leaseRemainingYears = (int) abs(now()->diffInYears($property->lease_expiry_date));
    }

    $tenure = null;
    if ($isLeasehold) {
        $tenure = $leaseRemainingYears
            ? strtoupper('Leasehold - '.$leaseRemainingYears.' years remaining')
            : 'LEASEHOLD';
    } elseif ($isFreehold) {
        $tenure = $property->land_title?->description()
            ? strtoupper('Freehold - '.$property->land_title->description())
            : 'FREEHOLD';
    }

    $priceSubtitle = null;
    if ($property->currency === App\Enums\Property\PropertyCurrency::IDR && $property->sale_price > 0) {
        if ($property->sale_price >= 1000000000) {
            $priceSubtitle = 'IDR '.rtrim(rtrim(number_format($property->sale_price / 1000000000, 1, '.', ''), '0'), '.').' Billion';
        } elseif ($property->sale_price >= 1000000) {
            $priceSubtitle = 'IDR '.rtrim(rtrim(number_format($property->sale_price / 1000000, 1, '.', ''), '0'), '.').' Million';
        }
    }
@endphp

<div class="row g-4">
    <div class="col-lg-7 col-xl-8">
        <div class="d-flex flex-wrap gap-2 mb-3">
            @if ($location)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-location-dot fa-fw fa-xs text-success"></span>
                    <span class="text-body">{{ $location }}, Bali</span>
                </span>
            @endif

            @if ($property->code)
                <span class="badge text-bg-light rounded-pill px-3 py-2">
                    <span class="fas fa-hashtag fa-fw fa-xs text-success"></span>
                    <span class="text-body">ID {{ $property->code }}</span>
                </span>
            @endif
        </div>

        @php($specs = collect([
            $property->bedroom?->description() ? $property->bedroom->description().' '.trans('property.bedrooms') : null,
            $property->number_of_bathrooms ? $property->number_of_bathrooms.' '.trans('property.bathrooms') : null,
            $property->building_size ? $property->building_size.' m² '.trans('property.building') : null,
            $property->land_size ? $property->land_size.' m² '.trans('property.land') : null,
        ])->filter())

        @if ($specs->isNotEmpty())
            <div class="row row-cols-2 row-cols-sm-4 g-3 border-top pt-4 mt-4">
                @if ($property->bedroom?->description())
                    <div class="col">
                        <div class="text-body-secondary small text-uppercase">{{ trans('property.bedrooms') }}</div>
                        <div class="h4 fw-semibold mb-0">{{ $property->bedroom->description() }}</div>
                    </div>
                @endif
                @if ($property->number_of_bathrooms)
                    <div class="col">
                        <div class="text-body-secondary small text-uppercase">{{ trans('property.bathrooms') }}</div>
                        <div class="h4 fw-semibold mb-0">{{ $property->number_of_bathrooms }}</div>
                    </div>
                @endif
                @if ($property->building_size)
                    <div class="col">
                        <div class="text-body-secondary small text-uppercase">{{ trans('property.building') }}</div>
                        <div class="h4 fw-semibold mb-0">{{ $property->building_size }} m²</div>
                    </div>
                @endif
                @if ($property->land_size)
                    <div class="col">
                        <div class="text-body-secondary small text-uppercase">{{ trans('property.land') }}</div>
                        <div class="h4 fw-semibold mb-0">{{ $property->land_size }} m²</div>
                    </div>
                @endif
            </div>
        @endif
    </div>

    <div class="col-lg-5 col-xl-4">
        <div class="card border shadow-sm rounded-4 position-sticky" style="top:1.5rem">
            <div class="card-body p-4">
                <div class="text-body-secondary small text-uppercase">{{ trans('property.sale_price') }}</div>
                <div class="fs-2 fw-bold text-success-emphasis">
                    {{ Str::currency($property->sale_price, $property->currency) }}
                </div>

                @if ($priceSubtitle)
                    <div class="text-body-secondary">{{ $priceSubtitle }}</div>
                @endif

                @if ($tenure)
                    <span class="badge text-bg-success rounded-pill mt-3 px-3 py-2">
                        {{ $tenure }}
                    </span>
                @endif

                <div class="d-grid gap-2 mt-4">
                    <a draggable="false" class="btn btn-success rounded-pill"
                        href="#enquiry"
                        onclick="document.getElementById('interest-more-information')?.click();">
                        <span class="fas fa-circle-info fa-fw"></span>
                        {{ trans('property.request_information') }}
                    </a>
                    <a draggable="false" class="btn btn-dark rounded-pill"
                        href="#enquiry"
                        onclick="document.getElementById('interest-booking-a-viewing')?.click();">
                        <span class="fas fa-calendar-check fa-fw"></span>
                        {{ trans('property.book_a_viewing') }}
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
