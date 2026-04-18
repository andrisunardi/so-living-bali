<?php

use App\Livewire\Component;

new class extends Component {};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                @livewire('contact.info')
            </div>
            <div class="col-lg-7 col-xl-8">
                {{-- @livewire('contact.form') --}}
            </div>
        </div>
    </div>
</section>
