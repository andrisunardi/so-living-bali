@props([
    'property' => null,
])

@php
    $isLeasehold = $property->has_leasehold;
    $isFreehold = $property->has_freehold;

    $leaseRemaining = null;
    if ($isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
        $leaseRemaining = (int) abs(now()->diffInYears($property->lease_expiry_date)).' years';
    }

    $rows = [];

    if ($isLeasehold) {
        $rows['Lease Expiry'] = $property->lease_expiry_date?->isoFormat('DD MMMM YYYY');
        $rows['Remaining Lease'] = $leaseRemaining;
        $rows['Extension'] = $property->lease_extension_available?->description();
        $rows['Extension Terms'] = filled($property->lease_extension_terms_or_price)
            ? Str::of($property->lease_extension_terms_or_price)->stripTags()->trim()->toString()
            : null;
    }

    if ($isFreehold) {
        $rows['Land Certificate'] = $property->land_title?->description() ?? ($property->land_certificate ? 'Yes' : null);
    }

    $rows['Zoning'] = filled($property->zoning)
        ? Str::of($property->zoning)->stripTags()->trim()->toString()
        : null;
    $rows['PBG'] = $property->pbg_status?->description();
    $rows['SLF'] = $property->slf_status?->description();
    $rows['Road Access'] = $property->road_access
        ? trim($property->road_access->description().' '.($property->road_access_width ? '('.$property->road_access_width.')' : ''))
        : null;

    $rows = array_filter($rows, fn ($value) => filled($value));
@endphp

@if (!empty($rows))
    <ul class="list-group list-group-flush">
        @foreach ($rows as $label => $value)
            <li class="list-group-item d-flex justify-content-between gap-3 px-0 bg-transparent">
                <span class="text-body-secondary">{{ $label }}</span>
                <span class="fw-semibold text-end">{{ $value }}</span>
            </li>
        @endforeach
    </ul>
@endif
