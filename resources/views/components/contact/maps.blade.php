<?php

use App\Livewire\Component;

new class extends Component {};
?>

<section class="py-5 bg-light">
    <div class="container-md">
        <div class="d-grid gap-3">
            <div>
                <h5 class="fw-bold">{{ trans('index.office_location') }}</h5>
                <h6>
                    <a draggable="false" class="text-secondary" href="{{ config('constants.contact.google_maps') }}"
                        target="_blank">
                        {{ config('constants.contact.address') }}
                    </a>
                </h6>
            </div>

            <iframe class="w-100 rounded-5" height="300" src="{{ config('constants.contact.google_maps_iframe') }}"></iframe>
        </div>
    </div>
</section>
