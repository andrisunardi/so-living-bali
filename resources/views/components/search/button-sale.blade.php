@props([
    'districts' => [],
    'areas' => [],
    'types' => [],
    'ownership' => null,
    'prices' => [],
])

<a draggable="false"
    href="{{ route('property.properties-for-sale', [
        'districts' => $districts,
        'areas' => $areas,
        'types' => $types,
        'ownership' => $ownership,
        'prices' => $prices,
    ]) }}"
    class="btn btn-success w-100 rounded-5" wire:navigate>
    <span class="fas fa-search fa-fw"></span>
    {{ trans('home.search.button') }}
</a>
