@props([
    'property' => null,
])

@php
    $statuses = [App\Enums\Property\PropertyStatus::AcceptUpper->value, App\Enums\Property\PropertyStatus::AcceptPremium->value];
    $listingTypes = [App\Enums\Property\PropertyListingType::ForSale->value, App\Enums\Property\PropertyListingType::ForRentAndSale->value];

    $service = new App\Services\PropertyService();
    $properties = $service->index(listingTypes: $listingTypes, statuses: $statuses, random: true, limit: 8, paginate: false);
    $properties = $properties->where('id', '!=', $property->id)->take(4);
    $properties->loadMissing(['area', 'district', 'image']);
@endphp

@if ($properties->isNotEmpty())
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @foreach ($properties as $similar)
            <div class="col" wire:key="similar-{{ $similar->id }}">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <a draggable="false" class="d-block"
                        href="{{ $similar->sale_url }}" wire:navigate>
                        <div class="ratio ratio-4x3">
                            <img draggable="false" loading="lazy" decoding="async" class="object-fit-cover w-100 h-100"
                                src="{{ $similar->image?->image_url ?? asset('images/placeholder.png') }}"
                                alt="{{ trans('property.property') }} - {{ $similar->name }} - {{ config('constants.meta.title') }}"
                                onerror="this.onerror=null; this.src='/images/placeholder.png';" />
                        </div>
                    </a>

                    <div class="card-body">
                        @if ($similar->area || $similar->district)
                            <div class="small text-body-secondary">
                                <span class="fas fa-location-dot fa-fw"></span>
                                {{ $similar->area?->name ?? $similar->district?->name }}
                            </div>
                        @endif

                        <h3 class="h6 mt-2">
                            <a draggable="false" class="text-body text-decoration-none"
                                href="{{ $similar->sale_url }}" wire:navigate>
                                {{ $similar->name }}
                            </a>
                        </h3>

                        <div class="small text-body-secondary">{{ $similar->code }}</div>

                        @php($specs = collect([
                            $similar->bedroom?->description() ? $similar->bedroom->description().' '.trans('property.bedrooms') : null,
                            $similar->building_size ? $similar->building_size.' m² '.trans('property.building') : null,
                            $similar->land_size ? $similar->land_size.' m² '.trans('property.land') : null,
                        ])->filter())

                        @if ($specs->isNotEmpty())
                            <div class="small text-body-secondary mt-1">{{ $specs->implode(' · ') }}</div>
                        @endif

                        <div class="fw-semibold text-success-emphasis mt-2">
                            {{ Str::currency($similar->sale_price, $similar->currency) }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
