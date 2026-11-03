@props([
    'property' => null,
    'nearby' => [],
])

<div class="row g-4">
    <div class="col-lg-6">
        @if ($property->latitude && $property->longitude)
            <div class="rounded-4 border overflow-hidden position-relative">
                <div id="sale-map" class="w-100 ratio ratio-4x3 rounded-4 z-0"></div>
                <span class="position-absolute bottom-0 start-0 m-2 badge text-bg-light border small fw-normal z-1">
                    {{ trans('property.approximate_location') }}
                </span>
            </div>
        @endif
    </div>

    <div class="col-lg-6">
        <h3 class="h5 fw-semibold mb-3">{{ trans('property.nearby') }}</h3>
        @if (! empty($nearby))
            <ul class="list-group list-group-flush">
                @foreach ($nearby as $place)
                    <li class="list-group-item d-flex justify-content-between align-items-center gap-3 px-0">
                        <span>{{ $place['name'] }}</span>
                        <span class="fw-semibold text-success text-nowrap">{{ $place['time'] }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-body-secondary mb-0">{{ trans('property.no_nearby_places') }}</p>
        @endif
    </div>
</div>

@if ($property->latitude && $property->longitude)
    @script
        <script>
            const saleMap = L.map('sale-map', {
                scrollWheelZoom: false,
                touchZoom: true,
                dragging: true,
                doubleClickZoom: true,
            }).setView([{{ $property->latitude }}, {{ $property->longitude }}], 15);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(saleMap);

            L.circle([{{ $property->latitude }}, {{ $property->longitude }}], {
                color: '#198754',
                fillColor: '#198754',
                fillOpacity: 0.5,
                radius: 500,
            }).addTo(saleMap);

            saleMap.attributionControl.remove();
        </script>
    @endscript
@endif
