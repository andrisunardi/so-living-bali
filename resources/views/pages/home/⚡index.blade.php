<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {};
?>

@section('title', trans('page.home'))

<div>
    {{-- prettier-ignore --}}
    <x-home.hero
    :title="trans('home.hero.title')"
    :description="trans('home.hero.description')"
    :image="asset('images/hero/home.webp')"
    />

    <livewire:home.our-values lazy />

    <livewire:home.select-locations lazy />

    <livewire:home.our-services lazy />

    {{-- prettier-ignore --}}
    <livewire:sections.guides
    :sub-title="trans('home.guides.sub_title')"
    :title="trans('home.guides.title')"
    :description="trans('home.guides.description')"
    lazy />

    {{-- prettier-ignore --}}
    <livewire:sections.faqs
    :sub-title="trans('home.faqs.sub_title')"
    :title="trans('home.faqs.title')"
    :description="trans('home.faqs.description')"
    lazy />

    {{-- prettier-ignore --}}
    <x-sections.cta
    :title="trans('home.cta.title')"
    :description="trans('home.cta.description')"
    :image-url="asset('images/banner/home.png')"
    :button-name="trans('home.cta.button')"
    :button-link="route('contact')"
    />
</div>
