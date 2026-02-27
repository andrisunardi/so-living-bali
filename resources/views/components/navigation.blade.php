<?php

use App\Livewire\Component;

new class extends Component {};
?>

<ul class="navbar-nav">
    <li class="nav-item">
        <a draggable="false" class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}"
            wire:navigate>
            <span class="fas fa-home fa-fw"></span> Home
        </a>
    </li>

    @canany(['product'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Transaction</span>
            </h6>
        </li>
    @endcanany

    @can('customer.product')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('product.*') ? 'active' : '' }}"
                href="{{ route('product.index') }}" wire:navigate>
                <span class="fas fa-box fa-fw"></span> Product
            </a>
        </li>
    @endcan

    @canany(['contact_subject'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Communication</span>
            </h6>
        </li>
    @endcanany

    @can('customer.contact_subject')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('contact-subject.*') ? 'active' : '' }}"
                href="{{ route('contact-subject.index') }}" wire:navigate>
                <span class="fas fa-tag fa-fw"></span> Contact Subject
            </a>
        </li>
    @endcan

    @canany(['hotel_inquiry', 'partnership', 'partnership_image', 'sales_outbound'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Sales</span>
            </h6>
        </li>
    @endcanany

    @can('customer.newsletter')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('newsletter.*') ? 'active' : '' }}"
                href="{{ route('newsletter.index') }}" wire:navigate>
                <span class="fas fa-envelopes-bulk fa-fw"></span> Newsletter
            </a>
        </li>
    @endcan

    @can('customer.hotel_inquiry')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('hotel-inquiry.*') ? 'active' : '' }}"
                href="{{ route('hotel-inquiry.index') }}" wire:navigate>
                <span class="fas fa-hotel fa-fw"></span> Hotel Inquiry
            </a>
        </li>
    @endcan

    @can('customer.partnership')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('partnership.*') ? 'active' : '' }}"
                href="{{ route('partnership.index') }}" wire:navigate>
                <span class="fas fa-user-friends fa-fw"></span> Partnership
            </a>
        </li>
    @endcan

    @can('customer.partnership_image')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('partnership-image.*') ? 'active' : '' }}"
                href="{{ route('partnership-image.index') }}" wire:navigate>
                <span class="fas fa-images fa-fw"></span> Partnership Image
            </a>
        </li>
    @endcan

    @can('customer.sales_outbound')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('sales-outbound.*') ? 'active' : '' }}"
                href="{{ route('sales-outbound.index') }}" wire:navigate>
                <span class="fas fa-address-book fa-fw"></span> Sales Outbound
            </a>
        </li>
    @endcan

    @canany(['announcement'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Marketing</span>
            </h6>
        </li>
    @endcanany

    @can('customer.announcement')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('announcement.*') ? 'active' : '' }}"
                href="{{ route('announcement.index') }}" wire:navigate>
                <span class="fas fa-bullhorn fa-fw"></span> Announcement
            </a>
        </li>
    @endcan

    @canany(['outlet', 'continent'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Master</span>
            </h6>
        </li>
    @endcanany

    @can('customer.outlet')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('outlet.*') ? 'active' : '' }}"
                href="{{ route('outlet.index') }}" wire:navigate>
                <span class="fas fa-building fa-fw"></span> Outlet
            </a>
        </li>
    @endcan

    @can('customer.nationality')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('nationality.*') ? 'active' : '' }}"
                href="{{ route('nationality.index') }}" wire:navigate>
                <span class="fas fa-flag fa-fw"></span> Nationality
            </a>
        </li>
    @endcan

    @can('customer.continent')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('continent.*') ? 'active' : '' }}"
                href="{{ route('continent.index') }}" wire:navigate>
                <span class="fas fa-globe fa-fw"></span> Continent
            </a>
        </li>
    @endcan

    @canany(['sleekflow_log'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Integration</span>
            </h6>
        </li>
    @endcanany

    @can('customer.sleekflow_log')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('sleekflow-log.*') ? 'active' : '' }}"
                href="{{ route('sleekflow-log.index') }}" wire:navigate>
                <span class="fas fa-history fa-fw"></span> Sleekflow Log
            </a>
        </li>
    @endcan

    @canany(['permission', 'role', 'user'])
        <li>
            <h6 class="fw-bold text-uppercase border-bottom pb-2 mt-3">
                <span>Access</span>
            </h6>
        </li>
    @endcanany

    @can('customer.permission')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('permission.*') ? 'active' : '' }}"
                href="{{ route('permission.index') }}" wire:navigate>
                <span class="fas fa-lock-open fa-fw"></span> Permission
            </a>
        </li>
    @endcan

    @can('customer.role')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('role.*') ? 'active' : '' }}"
                href="{{ route('role.index') }}" wire:navigate>
                <span class="fas fa-key fa-fw"></span> Role
            </a>
        </li>
    @endcan

    @can('customer.user')
        <li class="nav-item">
            <a draggable="false" class="nav-link {{ Route::is('user.*') ? 'active' : '' }}"
                href="{{ route('user.index') }}" wire:navigate>
                <span class="fas fa-user fa-fw"></span> User
            </a>
        </li>
    @endcan
</ul>
