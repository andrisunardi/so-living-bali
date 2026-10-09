<?php

use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyListingType;
use App\Livewire\Component;
use App\Services\PropertyService;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

new #[Lazy] class extends Component {
    public string $area = '';

    #[Url(except: [])]
    public array $districts = [];

    #[Url(except: [])]
    public array $areas = [];

    #[Url(except: [])]
    public array $types = [];

    #[Url(except: null)]
    public ?int $ownership = null;

    #[Url(except: [])]
    public array $prices = [];

    public function properties(): object
    {
        $statuses = [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value];
        $listingTypes = [PropertyListingType::ForSale->value, PropertyListingType::ForRentAndSale->value];

        $service = new PropertyService();
        $properties = $service->index(districts: $this->districts, areas: $this->areas, types: $this->types, ownershipType: $this->ownership, prices: $this->prices, listingTypes: $listingTypes, statuses: $statuses, paginate: false);
        $properties->loadMissing(['area', 'district', 'image']);

        return $properties;
    }

    #[On('districts-changed')]
    public function handleDistrictsChanged(array $districts = []): void
    {
        $this->districts = $districts;
    }

    #[On('areas-changed')]
    public function handleAreasChanged(array $areas = []): void
    {
        $this->areas = $areas;
    }

    #[On('types-changed')]
    public function handleTypesChanged(array $types = []): void
    {
        $this->types = $types;
    }

    #[On('ownership-changed')]
    public function handleOwnershipChanged(?int $ownership = null): void
    {
        $this->ownership = $ownership;
    }

    #[On('prices-changed')]
    public function handlePricesChanged(array $prices = []): void
    {
        $this->prices = $prices;
    }
};
?>

@placeholder
    <section class="py-5">
        <div class="container-md">
            <div class="d-flex flex-column gap-4">
                <div>
                    <div class="placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col">
                            <div class="ratio ratio-16x9 overflow-hidden">
                                <div class="placeholder-glow">
                                    <div class="placeholder w-100 h-100 rounded"></div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-4"></span>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-8"></span>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-3">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-3 rounded"></span>
                                </div>
                                <div class="placeholder-glow">
                                    <span class="placeholder col-3 rounded"></span>
                                </div>
                            </div>

                            <div class="mt-3 d-grid gap-2">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </div>
                                <div class="placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endplaceholder

<section class="py-5">
    <div class="container-md">
        <div class="d-flex flex-column gap-4">
            <div>
                <p class="lead mb-0">{{ trans('property.our_selection') }}</p>
                <h1 class="display-6 fw-medium">{{ trans('property.selected_properties') }}</h1>
                <p class="small text-muted">
                    {!! trans('property.property_count', [
                        'count' => $this->properties()->count(),
                        'area' => $area ?: 'all areas',
                    ]) !!}
                </p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach ($this->properties() as $property)
                    <div class="col" wire:key="property-{{ $property['id'] }}">
                        <div class="ratio ratio-16x9 overflow-hidden">
                            <a draggable="false" href="{{ route('property.detail', ['slug' => $property['slug']]) }}"
                                wire:navigate>
                                <img draggable="false" loading="lazy" decoding="async"
                                    class="img-fluid w-100 h-100 object-fit-cover rounded user-select-none pe-none"
                                    src="{{ $property->image->image_url ?? asset('images/placeholder.png') }}"
                                    alt="{{ trans('property.property') }} - {{ $property->name }} - {{ config('constants.meta.title') }}"
                                    onerror="this.onerror=null; this.src='/images/placeholder.png';" />
                            </a>
                        </div>

                        <div class="mt-3">
                            <span class="fas fa-location-dot fa-fw"></span>
                            @if ($property->area || $property->district)
                                {{ $property->area?->name ?? $property->district?->name }}
                            @endif
                        </div>

                        <h1 class="h6 mt-3">
                            <a draggable="false" class="text-body"
                                href="{{ route('property.detail', ['slug' => $property->slug]) }}" wire:navigate>
                                {{ $property->name }}
                            </a>
                        </h1>

                        <div class="d-flex text-nowrap gap-2">
                            <span class="px-2 py-1 small rounded bg-sand">
                                <span class="fas fa-code fa-fw fa-xs text-success"></span>
                                <span class="text-black small">{{ $property->code }}</span>
                            </span>

                            <span class="px-2 py-1 small rounded bg-sand">
                                <span class="fas fa-location-dot fa-fw fa-xs text-success"></span>
                                <span class="text-black small">
                                    @if ($property->area || $property->district)
                                        {{ $property->area?->name ?? $property->district?->name }}
                                    @endif
                                </span>
                            </span>

                            <span class="px-2 py-1 small rounded bg-sand">
                                <span class="fas fa-bed fa-fw fa-xs text-success"></span>
                                <span class="text-black small">{{ $property->bedroom?->description() ?? 0 }}</span>
                            </span>
                        </div>

                        <div class="mt-3 d-grid gap-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-secondary">
                                    {{ $property->ownership_type?->description() ?? '-' }}
                                </span>
                                <span class="fw-medium">{{ Str::currency($property->sale_price) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
