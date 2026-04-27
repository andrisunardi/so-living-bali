<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {};
?>

@section('title', trans('page.home'))

<div>
    @if (request()->getHost() == 'solivingbali.com')
        <x-home.coming-soon />
    @else
        <x-home.hero :title="trans('home.hero.title')" :description="trans('home.hero.description')" :image="asset('images/banner/home.png')," />

        <livewire:home.our-values lazy />
    @endif
</div>
