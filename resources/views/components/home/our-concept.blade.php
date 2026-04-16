<?php

use App\Livewire\Component;

new class extends Component {};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="text-center">
                    <p class="lead mb-0">{{ trans('home.our_concept.sub_title') }}</p>
                    <h2 class="display-6 fw-bold">{{ trans('home.our_concept.title') }}</h2>
                    <p class="small px-5">{{ trans('home.our_concept.description') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
