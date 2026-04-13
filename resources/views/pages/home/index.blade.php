<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {};
?>

@section('title', trans('page.home'))

<div class="m-0">
    <div class="vh-100 overflow-hidden">
        <img src="{{ asset('images/banner.png') }}" class="w-100 h-100 object-fit-cover" alt="Banner">
    </div>

    {{-- <livewire:home.hero :title="trans('home.hero.title') ?? null" :description="trans('home.hero.description') ?? null" :image="asset('images/banner/home.jpg')" /> --}}
</div>
