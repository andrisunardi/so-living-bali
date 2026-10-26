@props([
    'property' => null,
])

@php
    $isLeasehold = $property->ownership_type === App\Enums\Property\PropertyOwnershipType::Leasehold;
    $isFreehold = $property->ownership_type === App\Enums\Property\PropertyOwnershipType::Freehold;

    $leaseRemaining = null;
    if ($isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
        $leaseRemaining = (int) abs(now()->diffInYears($property->lease_expiry_date)).' years';
    }

    $rows = [];

    if ($isLeasehold) {
        $rows['Lease Expiry'] = $property->lease_expiry_date?->isoFormat('DD MMMM YYYY');
        $rows['Remaining Lease'] = $leaseRemaining;
        $rows['Extension'] = $property->lease_extension_available?->description();
        $rows['Extension Terms'] = $property->lease_extension_terms_or_price;
    }

    if ($isFreehold) {
        $rows['Land Certificate'] = $property->land_title?->description() ?? ($property->land_certificate ? 'Yes' : null);
    }

    $rows['Zoning'] = $property->zoning;
    $rows['PBG'] = $property->pbg_status?->description();
    $rows['SLF'] = $property->slf_status?->description();
    $rows['Road Access'] = $property->road_access
        ? trim($property->road_access->description().' '.($property->road_access_width ? '('.$property->road_access_width.')' : ''))
        : null;

    $rows = array_filter($rows, fn ($value) => filled($value));
@endphp

@if (!empty($rows))
    <dl class="slb-dl">
        @foreach ($rows as $label => $value)
            <dt>{{ $label }}</dt>
            <dd>{{ $value }}</dd>
        @endforeach
    </dl>
@endif
