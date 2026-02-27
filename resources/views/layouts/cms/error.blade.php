<?php

use App\Livewire\Component;

new class extends Component {};
?>

<main class="container d-flex justify-content-center align-items-center text-center vh-100 my-sm-5 my-md-auto">
    <div class="d-grid gap-4">
        <div class="d-flex justify-content-center">
            <img draggable="false" width="100" src="{{ asset('images/logo.png') }}"
                alt="Logo - {{ config('app.name') }}">
        </div>

        <div>
            <h1>@yield('code')</h1>
            <h3>@yield('message')</h3>
            <p class="lead">@yield('description')</p>

            <a draggable="false" class="btn btn-primary rounded-pill"
                href="{{ url()->previous() == url()->current() ? route('home') : url()->previous() }}">
                <span class="fas fa-arrow-left fa-fw"></span>
                Back To Previous Page
            </a>
        </div>

        <div class="text-body-secondary text-center small">
            <div class="small">
                &copy; Copyright {{ now()->year }} &reg;
                <strong>{{ config('app.name') }}</strong>&trade;
                All Rights Reserved.
            </div>
            <div class="small">
                Created and Designed By <b>DIW.co.id</b>
            </div>
        </div>
    </div>
</main>
