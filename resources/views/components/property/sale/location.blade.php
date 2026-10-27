@props([
    'property' => null,
])

<div class="d-grid gap-3">
    <div class="rounded-4 border overflow-hidden">
        <div id="sale-map" class="w-100 ratio ratio-4x3 rounded-4 z-0"></div>
    </div>

    <div id="sale-poi" class="card rounded-4 border overflow-hidden d-none">
        <ul id="sale-poi-list" class="list-group list-group-flush"></ul>
    </div>
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
            color: '#198754',
            fillColor: '#198754',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(saleMap);

        saleMap.attributionControl.remove();

        (async () => {
            try {
                const lat = {{ $property->latitude }};
                const lng = {{ $property->longitude }};
                const query = `[out:json][timeout:10];node[amenity~"^(restaurant|cafe|hospital|school)$"](around:1500,${lat},${lng});out 10;`;

                const response = await fetch('https://overpass-api.de/api/interpreter', {
                    method: 'POST',
                    headers: { 'Content-Type': 'text/plain' },
                    body: query,
                });

                if (!response.ok) {
                    return;
                }

                const data = await response.json();
                const places = (data.elements || [])
                    .filter((element) => element.tags && element.tags.name)
                    .slice(0, 6);

                if (!places.length) {
                    return;
                }

                const list = document.getElementById('sale-poi-list');

                places.forEach((place) => {
                    const item = document.createElement('li');
                    item.className = 'list-group-item d-flex justify-content-between align-items-center';

                    const name = document.createElement('span');
                    name.textContent = place.tags.name;

                    const badge = document.createElement('span');
                    badge.className = 'badge rounded-pill text-bg-success text-capitalize';
                    badge.textContent = place.tags.amenity;

                    item.appendChild(name);
                    item.appendChild(badge);
                    list.appendChild(item);
                });

                document.getElementById('sale-poi').classList.remove('d-none');
            } catch (error) {
                return;
            }
        })();
    </script>
@endscript
