@props([
    'ownership' => null,
])

<div>
    <label class="form-label">
        <span class="fas fa-key fa-fw"></span>
        {{ trans('home.search.ownership') }}
    </label>
    <div class="input-group">
        <button type="button" class="btn d-flex justify-content-between align-items-center border w-100 dropdown-toggle"
            data-bs-toggle="dropdown" data-bs-auto-close="outside" data-bs-display="static">
            @if ($ownership)
                {{ PropertyOwnershipType::from($ownership)->translate() }}
            @else
                {{ trans('index.all') }}
            @endif
        </button>

        <ul class="dropdown-menu w-100 mt-3">
            <li wire:key="living-style">
                <button type="button" class="dropdown-item d-flex justify-content-between"
                    wire:click="changeOwnership">
                    {{ trans('index.all') }}
                    @if (!$ownership)
                        <span class="fas fa-check fa-fw text-success"></span>
                    @endif
                </button>
            </li>
            @foreach (PropertyOwnershipType::cases() as $propertyOwnership)
                <li wire:key="living-style-{{ $propertyOwnership }}">
                    <button type="button" class="dropdown-item d-flex justify-content-between"
                        wire:click="changeOwnership({{ $propertyOwnership->value }})">
                        {{ $propertyOwnership->translate() }}
                        @if ($propertyOwnership->value == $ownership)
                            <span class="fas fa-check fa-fw text-success"></span>
                        @endif
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
