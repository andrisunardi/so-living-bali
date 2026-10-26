<?php

use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use Livewire\Attributes\Title;

new #[Title('Property For Sale')] class extends Component {
    public ?Property $property = null;

    public function mount(string $slug): void
    {
        $service = new PropertyService();
        $this->property = $service->saleDetail(slug: $slug);

        if (!$this->property) {
            abort(404);
        }

        $this->property->loadMissing(['area.district', 'district', 'image', 'images']);

        $service->counter(property: $this->property);
    }
};
?>

@section('title', $property->name)

<div class="slb-page">
    <section class="py-5">
        <div class="container-md">
            <h1>{{ $property->name }}</h1>
        </div>
    </section>
</div>
