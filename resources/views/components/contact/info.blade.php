<?php

use App\Livewire\Component;

new class extends Component {};
?>

<div class="d-grid gap-4">
    <div>
        <h2 class="display-6 fw-bold">{{ trans('contact.info.title') }}</h2>
        <p class="mt-3">{{ trans('contact.info.description') }}</p>
    </div>
    <div class="d-grid gap-3">
        <h4 class="lead fw-medium">{{ trans('contact.info.contact') }}</h4>
        <a draggable="false"
            href="https://api.whatsapp.com/send/?phone={{ config('constants.contact.whatsapp') }}&text=Hello, i know from your website solivingbali.com"
            target="_blank">
            <span class="fab fa-whatsapp fa-fw text-success"></span>
            {{ config('constants.contact.whatsapp') }}
        </a>
        <a draggable="false" href="mailto:{{ config('constants.contact.email') }}" target="_blank">
            <span class="fas fa-envelope fa-fw text-success"></span>
            {{ config('constants.contact.email') }}
        </a>
    </div>
</div>
