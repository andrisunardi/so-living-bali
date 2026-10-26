@props([
    'property' => null,
])

<div class="slb-map">
    <div id="sale-map" class="slb-map-canvas z-0"></div>
</div>

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
            color: '#1a8754',
            fillColor: '#1a8754',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(saleMap);

        saleMap.attributionControl.remove();
    </script>
@endscript
