@props([
    'property' => null,
])

@php
    use App\Enums\Property\PropertyOwnershipType;
    use App\Enums\Property\PropertyListingType;
    use App\Enums\Property\PropertyStatus;

    $statuses = [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value];
    $listingTypes = [PropertyListingType::ForSale->value, PropertyListingType::ForRentAndSale->value];

    $service = new App\Services\PropertyService();
    $pool = $service->index(listingTypes: $listingTypes, statuses: $statuses, limit: 50, paginate: false);
    $pool = $pool->where('id', '!=', $property->id);
    $pool->loadMissing(['area', 'district', 'image']);

    $properties = $pool
        ->sortByDesc(function ($similar) use ($property) {
            $score = 0;
            if ($property->area_id && $similar->area_id === $property->area_id) {
                $score += 8;
            }
            if ($property->district_id && $similar->district_id === $property->district_id) {
                $score += 4;
            }
            if ($property->type && $similar->type === $property->type) {
                $score += 2;
            }
            if ($property->ownership_type && $similar->ownership_type === $property->ownership_type) {
                $score += 2;
            }
            if ($property->bedroom && $similar->bedroom === $property->bedroom) {
                $score += 1;
            }

            return $score;
        })
        ->take(4)
        ->values();

    $location = $property->area?->name ?? $property->district?->name;
    $areaFilterUrl = $property->area
        ? route('property.properties-for-sale', ['areas' => [$property->area->id]])
        : ($property->district ? route('property.properties-for-sale', ['districts' => [$property->district->id]]) : route('property.properties-for-sale'));
@endphp

@if ($properties->isNotEmpty())
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @foreach ($properties as $similar)
            @php
                $similarLeaseYears = null;
                if ($similar->ownership_type === PropertyOwnershipType::Leasehold && $similar->lease_expiry_date && $similar->lease_expiry_date->isFuture()) {
                    $similarLeaseYears = (int) abs(now()->diffInYears($similar->lease_expiry_date));
                }
            @endphp
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

                        @if ($similar->ownership_type?->description())
                            <span class="badge text-bg-light rounded-pill mt-1">
                                {{ $similar->ownership_type->description() }}@if ($similarLeaseYears) · {{ $similarLeaseYears }} {{ trans('property.years') }}@endif
                            </span>
                        @endif

                        @php($specs = collect([
                            $similar->bedroom?->description() ? $similar->bedroom->description().' '.trans('property.bedrooms') : null,
                            $similar->building_size ? $similar->building_size.' m² '.trans('property.building') : null,
                            $similar->land_size ? $similar->land_size.' m² '.trans('property.land') : null,
                        ])->filter())

                        @if ($specs->isNotEmpty())
                            <div class="small text-body-secondary mt-2">{{ $specs->implode(' · ') }}</div>
                        @endif

                        <div class="fw-semibold text-success-emphasis mt-2">
                            {{ Str::currency($similar->sale_price, $similar->currency) }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex flex-wrap gap-2 mt-4">
        @if ($location)
            <a draggable="false" class="btn btn-outline-success rounded-pill" href="{{ $areaFilterUrl }}" wire:navigate>
                {{ trans('property.view_more_in_area', ['area' => $location]) }}
                <span class="fas fa-chevron-right fa-fw fa-xs"></span>
            </a>
        @endif
        <a draggable="false" class="btn btn-outline-dark rounded-pill"
            href="{{ route('property.properties-for-sale') }}" wire:navigate>
            {{ trans('property.view_all_properties_for_sale') }}
            <span class="fas fa-chevron-right fa-fw fa-xs"></span>
        </a>
    </div>
@endif
