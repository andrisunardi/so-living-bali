@props([
    'property' => null,
])

@php
    $source = null;
    $label = null;

    if ($property->area && filled($property->area->translate_description)) {
        $source = $property->area->translate_description;
        $label = $property->area->name;
    } elseif ($property->district && filled($property->district->translate_description)) {
        $source = $property->district->translate_description;
        $label = $property->district->name;
    }
@endphp

@if (filled($source))
    <section class="pb-5">
        <div class="container-md">
            <div class="rounded-4 p-4 p-lg-5 bg-body-tertiary">
                <h2 class="h4 fw-semibold mb-3">{{ trans('property.about_the_area', ['area' => $label]) }}</h2>
                <div class="text-body-secondary">
                    {!! nl2br(e($source)) !!}
                </div>
            </div>
        </div>
    </section>
@endif
