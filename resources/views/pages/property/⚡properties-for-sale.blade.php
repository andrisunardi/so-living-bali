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

    #[Url(except: null)]
    public ?string $start_date = null;

    #[Url(except: null)]
    public ?string $end_date = null;

    #[Url(except: [])]
    public array $bedrooms = [];

    #[Url(except: null)]
    public ?int $living_style = null;

    #[Url(except: null)]
    public ?int $rental_type = null;

    #[Url(except: [])]
    public array $prices = [];

    public function mount(): void
    {
        if ($this->districts || $this->areas) {
            $selectedDistricts = $this->districts()->whereIn('id', $this->districts);
            $selectedAreas = $this->districts()->pluck('areas')->flatten()->whereIn('id', $this->areas);
            $this->area = collect()->merge($selectedDistricts->pluck('name'))->merge($selectedAreas->pluck('name'))->unique()->join(', ');
        }

        $this->start_date = $this->start_date ?? today()->toDateString();
        $this->end_date = $this->end_date ?? today()->toDateString();
    }

    // CEK NANTI
    public function districts(): object
    {
        $service = new DistrictService();
        $districts = $service->index(isShow: [true], isActive: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
        $districts->loadMissing(['areas' => fn($q) => $q->show()->active()]);

        return $districts;
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
</div>
