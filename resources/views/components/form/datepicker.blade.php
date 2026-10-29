@props([
    'model',
    'id' => null,
    'min' => null,
    'max' => null,
    'required' => false,
    'disabled' => false,
    'live' => false,
])

<div wire:ignore x-data x-init="flatpickr($refs.datepicker, {
    altInput: true,
    altFormat: 'd/m/Y',
    dateFormat: 'Y-m-d',
    disableMobile: true,
    defaultDate: @js(data_get($this, $model) ?: null),
    onChange: function (selectedDates, dateStr) {
        $wire.set('{{ $model }}', dateStr, {{ $live ? 'true' : 'false' }});
    },
});">
    <input type="text" x-ref="datepicker"
        @if ($id) id="{{ $id }}" @endif
        @if ($required) required @endif
        @if ($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control']) }}>
</div>
