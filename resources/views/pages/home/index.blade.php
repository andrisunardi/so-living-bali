<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {};
?>

@section('title', trans('page.home'))

<div>
    @if (request()->getHost() == 'solivingbali.com')
        <div class="m-0">
            <div class="vh-100 d-none d-sm-block d-md-none d-lg-block">
                <img src="{{ asset('images/banner.png') }}" class="w-100 h-100 object-fit-cover" alt="Banner">
            </div>
            <div class="vh-100 d-sm-none d-md-block d-lg-none">
                <img src="{{ asset('images/banner-mobile.png') }}" class="w-100 h-100 object-fit-cover"
                    alt="Banner Mobile">
            </div>
        </div>
    @else
        @livewire('home.hero', [
            'title' => trans('home.hero.title'),
            'description' => trans('home.hero.description'),
            'image' => asset('images/banner/home.jpg'),
        ])

        @livewire('home.our-values')
    @endif
</div>
