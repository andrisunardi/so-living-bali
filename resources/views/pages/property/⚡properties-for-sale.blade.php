<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Services\DistrictService;

new #[Title('Properties For Sale')] class extends Component {
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
    public array $prices = [
        'min' => 40000000,
        'max' => 2500000000,
    ];

    public int $price_min = 40000000;

    public int $price_max = 2500000000;

    public function mount(): void
    {
        if ($this->districts || $this->areas) {
            $selectedDistricts = $this->districts()->whereIn('id', $this->districts);
            $selectedAreas = $this->districts()->pluck('areas')->flatten()->whereIn('id', $this->areas);
            $this->area = collect()->merge($selectedDistricts->pluck('name'))->merge($selectedAreas->pluck('name'))->unique()->join(', ');
        }
    }

    // CEK NANTI
    public function districts(): object
    {
        $service = new DistrictService();
        $districts = $service->index(isShow: [true], isActive: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
        $districts->loadMissing(['areas' => fn($q) => $q->show()->active()]);

        return $districts;
    }

    public function changeTypes(?int $value = null): void
    {
        $this->dispatch('keep-type-dropdown-open');

        if (!$value) {
            $this->reset('types');

            return;
        }

        $this->types = in_array($value, $this->types) ? array_values(array_diff($this->types, [$value])) : [...$this->types, $value];
    }

    public function changeOwnership(?int $ownership = null): void
    {
        $this->ownership = $ownership;
        $this->dispatch('ownership-changed', ownership: $this->ownership);
    }

    public function updatedPrices()
    {
        $this->dispatch('keep-price-dropdown-open');
    }

    public function clearAllPrice(): void
    {
        $this->reset(['prices']);
    }
};
?>

@section('title', trans('page.properties_for_sale'))

<div>
    {{-- prettier-ignore --}}
    <x-property.hero
    :sub-title="trans('property.hero.sub_title')"
    :title="trans('property.hero.title')"
    :description="trans('property.hero.description')"
    :image="asset('images/hero/property.webp')"
    />

    {{-- prettier-ignore --}}
    <x-property.search
    :area="$area"
    :districts="$districts"
    :areas="$areas"
    :list-districts="$this->districts()"
    :types="$types"
    :ownership="$ownership"
    :prices="$prices"
    :price-min="$price_min"
    :price-max="$price_max"
    />

    {{-- prettier-ignore --}}
    <livewire:property.sale
    :area="$area"
    :districts="$districts"
    :areas="$areas"
    :types="$types"
    :ownership="$ownership"
    :prices="$prices"
    lazy />

    {{-- prettier-ignore --}}
    <x-sections.overview
    :sub-title="trans('property.overview.sub_title')"
    :title="trans('property.overview.title')"
    :description="trans('property.overview.description')"
    :image-url="asset('images/property/overview.webp')"
    />

    {{-- prettier-ignore --}}
    <livewire:sections.guides
    :sub-title="trans('property.guides.sub_title')"
    :title="trans('property.guides.title')"
    lazy />

    <livewire:sections.faqs lazy />

    {{-- prettier-ignore --}}
    <x-sections.cta
    :title="trans('property.cta.title')"
    :description="trans('property.cta.description')"
    :image-url="asset('images/banner/property.png')"
    :button-name="trans('property.cta.button')"
    :button-link="route('contact')"
    />
</div>
