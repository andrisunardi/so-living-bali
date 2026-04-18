<?php

use App\Livewire\Component;

new class extends Component {};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="row g-4">
            <div class="col-lg-4">
                @livewire('contact.info')
            </div>
            <div class="col-lg-8 col-xl-7 offset-xl-1">
                @livewire('contact.form')
            </div>
        </div>
    </div>
</section>
