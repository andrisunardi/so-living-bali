<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {};
?>

@section('title', trans('page.home'))

<div>
    <livewire:home.hero :title="trans('home.hero.title') ?? null" :description="trans('home.hero.description') ?? null" :image="asset('images/banner/home.jpg')" />
</div>
