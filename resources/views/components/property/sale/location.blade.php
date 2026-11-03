@props([
    'mapUrl' => null,
    'nearby' => [],
    'location' => null,
])

<div class="row g-4">
    @if ($mapUrl)
        <div class="col-lg-7">
            <div class="ratio ratio-4x3 rounded-4 overflow-hidden border position-relative">
                <iframe src="{{ $mapUrl }}" title="{{ $location ? trans('property.map_of').' '.$location : trans('property.nearby') }}"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="border-0 w-100 h-100"
                    allowfullscreen></iframe>
                <span class="position-absolute bottom-0 start-0 m-2 badge text-bg-light border small fw-normal">
                    {{ trans('property.approximate_location') }}
                </span>
            </div>
        </div>
    @endif

    @if (! empty($nearby))
        <div class="{{ $mapUrl ? 'col-lg-5' : 'col-12' }}">
            <div class="card rounded-4 border overflow-hidden h-100">
                <ul class="list-group list-group-flush">
                    @foreach ($nearby as $place)
                        <li class="list-group-item">
                            <a draggable="false" class="d-flex align-items-center gap-3 text-decoration-none link-body-emphasis"
                                href="{{ $place['url'] }}" target="_blank" rel="noopener noreferrer">
                                <span class="fas {{ $place['icon'] }} fa-fw text-success"></span>
                                <span class="flex-grow-1">{{ $place['label'] }}</span>
                                <span class="fas fa-arrow-up-right-from-square fa-fw fa-xs text-body-tertiary"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
