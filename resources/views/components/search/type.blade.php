@props([
    'types' => [],
])

<div>
    <label class="form-label">
        <span class="fas fa-building fa-fw"></span>
        {{ trans('home.search.property_type') }}
    </label>
    <div class="input-group">
        <button type="button" data-type-dropdown
            class="btn d-flex justify-content-between align-items-center border w-100 dropdown-toggle text-truncate"
            data-bs-toggle="dropdown" data-bs-auto-close="outside" data-bs-display="static">
            @if ($types)
                {{ collect($types)->map(fn($type) => PropertyType::from($type)->description())->join(', ') }}
            @else
                {{ trans('index.all') }}
            @endif
        </button>

        <ul class="dropdown-menu w-100 mt-3">
            <li wire:key="type">
                <button type="button" class="dropdown-item d-flex justify-content-between" wire:click="changeTypes">
                    {{ trans('index.all') }}
                    @if (!$types)
                        <span class="fas fa-check fa-fw text-success"></span>
                    @endif
                </button>
            </li>
            @foreach (PropertyType::cases() as $propertyType)
                <li wire:key="property-type-{{ $propertyType }}">
                    <button type="button" class="dropdown-item d-flex justify-content-between"
                        wire:click="changeTypes({{ $propertyType->value }})">
                        {{ $propertyType->description() }}
                        @if (in_array($propertyType->value, $types))
                            <span class="fas fa-check fa-fw text-success"></span>
                        @endif
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('keep-type-dropdown-open', () => {
            document.querySelectorAll('[data-type-dropdown]').forEach(el => {
                const dropdown =
                    bootstrap.Dropdown.getInstance(el) ??
                    new bootstrap.Dropdown(el)
                dropdown.show()
            })
        })
    });
</script>
