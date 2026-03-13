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

    @canany(['contact', 'article', 'property', 'property_image'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>{{ trans('page.module') }}</span>
            </h6>
        </li>
    @endcanany

    @can('contact')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.contact.*') ? 'active' : '' }}"
                href="{{ route('cms.contact.index') }}" wire:navigate>
                <span class="fas fa-phone fa-fw"></span>
                {{ trans('page.contact') }}
            </a>
        </li>
    @endcan

    @can('article')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.article.*') ? 'active' : '' }}"
                href="{{ route('cms.article.index') }}" wire:navigate>
                <span class="fas fa-newspaper fa-fw"></span>
                {{ trans('page.article') }}
            </a>
        </li>
    @endcan

    @can('property')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.property.*') ? 'active' : '' }}"
                href="{{ route('cms.property.index') }}" wire:navigate>
                <span class="fas fa-building fa-fw"></span>
                {{ trans('page.property') }}
            </a>
        </li>
    @endcan

    @can('property_image')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.property-image.*') ? 'active' : '' }}"
                href="{{ route('cms.property-image.index') }}" wire:navigate>
                <span class="fas fa-images fa-fw"></span>
                {{ trans('page.property_image') }}
            </a>
        </li>
    @endcan

    @canany(['district', 'area'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>{{ trans('page.master') }}</span>
            </h6>
        </li>
    @endcanany

    @can('area')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.area.*') ? 'active' : '' }}"
                href="{{ route('cms.area.index') }}" wire:navigate>
                <span class="fas fa-lock-open fa-fw"></span> {{ trans('page.area') }}
            </a>
        </li>
    @endcan

    @can('district')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('cms.district.*') ? 'active' : '' }}"
                href="{{ route('cms.district.index') }}" wire:navigate>
                <span class="fas fa-lock-open fa-fw"></span> {{ trans('page.district') }}
            </a>
        </li>
    @endcan

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
