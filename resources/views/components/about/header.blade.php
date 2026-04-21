<?php

use App\Livewire\Component;

new class extends Component {};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-8">
                <h1>{{ trans('about.header.title') }}</h1>
                <p>{{ trans('about.header.description') }}</p>
            </div>
        </div>

        <img draggable="false" class="w-100 h-100 user-select-none pe-none" src="{{ asset('images/banner/about.png') }}"
            alt="{{ trans('index.banner') }} - {{ trans('page.about') }} - {{ config('constants.name') }}">
    </div>
</section>
