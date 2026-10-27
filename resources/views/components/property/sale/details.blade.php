@props([
    'property' => null,
])

@php
    $isLeasehold = $property->ownership_type === App\Enums\Property\PropertyOwnershipType::Leasehold;

    $leaseRemaining = null;
    if ($isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
        $leaseRemaining = (int) abs(now()->diffInYears($property->lease_expiry_date)).' years';
    }

    $rows = [
        'Property Type' => $property->type?->description(),
        'Ownership' => $property->ownership_type?->description(),
        'Lease Expiry' => $property->lease_expiry_date?->isoFormat('DD MMMM YYYY'),
        'Lease Remaining' => $leaseRemaining,
        'Extension' => $property->lease_extension_available?->description(),
        'Bedrooms' => $property->bedroom?->description(),
        'Bathrooms' => $property->number_of_bathrooms,
        'Land Size' => $property->land_size ? $property->land_size.' m²' : null,
        'Building Size' => $property->building_size ? $property->building_size.' m²' : null,
        'Outdoor Area' => $property->outdoor_area_size ? $property->outdoor_area_size.' m²' : null,
        'Year Built' => $property->year_built,
        'Furnishing' => $property->fully_furnished ? trans('property.fully_furnished') : null,
        'Pool' => $property->pool_size,
        'Parking' => $property->car_access ? 'Yes' : null,
        'Property ID' => $property->code ?? $property->reference,
    ];

    $rows = array_filter($rows, fn ($value) => filled($value));
@endphp

<ul class="list-group list-group-flush">
    @foreach ($rows as $label => $value)
        <li class="list-group-item d-flex justify-content-between gap-3 px-0">
            <span class="text-body-secondary">{{ $label }}</span>
            <span class="fw-semibold text-end">{{ $value }}</span>
        </li>
    @endforeach
</ul>
