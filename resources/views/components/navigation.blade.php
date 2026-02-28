<?php

use App\Livewire\Component;

new class extends Component {};
?>

<ul class="navbar-nav">
    <li class="nav-item">
        <a draggable="false" class="nav-link {{ Route::is('cms.home') ? 'active' : '' }}" href="{{ route('cms.home') }}"
            wire:navigate>
            <span class="fas fa-home fa-fw"></span> Home
        </a>
    </li>
</ul>
