<?php

use App\Livewire\Component;

new class extends Component {};
?>

<ul class="navbar-nav">
    <li class="nav-item">
        <a draggable="false" class="nav-link {{ Route::is('cms.home') ? 'active' : '' }}" href="{{ route('cms.home') }}"
            wire:navigate>
            <span class="fas fa-home fa-fw"></span> {{ trans('page.home') }}
        </a>
    </li>

    @canany(['permission', 'role', 'user'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>{{ trans('page.access') }}</span>
            </h6>
        </li>
    @endcanany

    @can('permission')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.permission.*') ? 'active' : '' }}"
                href="{{ route('cms.permission.index') }}" wire:navigate>
                <span class="fas fa-lock-open fa-fw"></span> {{ trans('page.permission') }}
            </a>
        </li>
    @endcan

    @can('role')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.role.*') ? 'active' : '' }}"
                href="{{ route('cms.role.index') }}" wire:navigate>
                <span class="fas fa-key fa-fw"></span> {{ trans('page.role') }}
            </a>
        </li>
    @endcan

    @can('user')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.user.*') ? 'active' : '' }}"
                href="{{ route('cms.user.index') }}" wire:navigate>
                <span class="fas fa-user fa-fw"></span> {{ trans('page.user') }}
            </a>
        </li>
    @endcan
</ul>
