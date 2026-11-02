<?php

use App\Livewire\Component;
use App\Models\Guide;
use App\Services\GuideService;
use Livewire\Attributes\Title;

new #[Title('Guide')] class extends Component {
    public Guide $guide;

    public function mount(): void
    {
        $service = new GuideService();
        $this->guide = $service->latest();
        $this->guide->loadMissing(['category']);
    }
};
?>

@section('title', trans('page.guide'))

<div>
    <h1 class="visually-hidden">{{ trans('page.guide') }} - {{ config('constants.meta.title') }}</h1>

    <x-guide.content :guide="$guide" heading="h2" />

    <livewire:guide.another />
</div>
