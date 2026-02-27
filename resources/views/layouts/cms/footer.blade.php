<?php

use App\Livewire\Component;

new class extends Component {};
?>

<footer class="bg-body-tertiary small p-3">
    <div class="row justify-content-between align-items-center small">
        <div class="col-md text-center text-md-start">
            &copy; Copyright {{ now()->year }} &reg;
            <strong>{{ config('app.name') }}</strong>&trade;
            All Rights Reserved.
        </div>
        <div class="col-md-auto text-center text-md-end">
            Created and Designed By <b>PT Kreasi Bali Prima</b>
        </div>
    </div>
</footer>
