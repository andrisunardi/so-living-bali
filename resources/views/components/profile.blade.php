<?php

use App\Livewire\Component;

new class extends Component {};
?>

<div>
    <button type="button" class="btn d-sm-flex align-items-sm-center gap-sm-1" data-bs-toggle="offcanvas"
        data-bs-target="#profile">
        <span class="fas fa-user-circle fa-fw"></span>
        <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>

    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="profile">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">
                Profile Menu
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <div class="row align-items-center g-3">
                <div class="col-3">
                    <div class="ratio ratio-1x1">
                        <img draggable="false" class="img-fluid w-100 h-100 rounded-circle object-fit-cover"
                            src="{{ Auth::user()->image_url ?? asset('images/user.png') }}"
                            alt="User - {{ Auth::user()->id }}" onerror="this.src='{{ asset('images/user.png') }}'" />
                    </div>
                </div>

                <div class="col-9">
                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                    <div class="small">{{ Auth::user()->username }}</div>
                    <div class="small">{{ Auth::user()->roles->pluck('name')->join(', ') }}</div>
                </div>
            </div>

            <hr />

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a draggable="false" class="nav-link {{ Route::is('cms.profile.index') ? 'active' : '' }}"
                        href="{{ route('cms.profile.index') }}">
                        <span class="fas fa-user fa-fw"></span> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a draggable="false" class="nav-link {{ Route::is('cms.profile.edit-profile') ? 'active' : '' }}"
                        href="{{ route('cms.profile.edit-profile') }}">
                        <span class="fas fa-user-edit fa-fw"></span> Edit Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a draggable="false"
                        class="nav-link {{ Route::is('cms.profile.change-password') ? 'active' : '' }}"
                        href="{{ route('cms.profile.change-password') }}">
                        <span class="fas fa-user-lock fa-fw"></span> Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a draggable="false" class="nav-link {{ Route::is('cms.profile.setting') ? 'active' : '' }}"
                        href="{{ route('cms.profile.setting') }}">
                        <span class="fas fa-user-gear fa-fw"></span> Setting
                    </a>
                </li>
                <li class="nav-item">
                    <a draggable="false" class="nav-link {{ Route::is('cms.profile.activity') ? 'active' : '' }}"
                        href="{{ route('cms.profile.activity') }}">
                        <span class="fas fa-user-clock fa-fw"></span> Activity
                    </a>
                </li>
                <li class="nav-item">
                    <a draggable="false" class="nav-link" href="{{ route('cms.logout') }}">
                        <span class="fas fa-sign-out-alt fa-fw"></span> Logout
                    </a>
                </li>
            </ul>

            <hr />

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-light border-dark w-100" data-bs-theme-value="light">
                        <span class="fas fa-sun fa-fw"></span> Light
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-dark border-light w-100" data-bs-theme-value="dark">
                        <span class="fas fa-moon fa-fw"></span> Dark
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary w-100" data-bs-theme-value="auto">
                        <span class="fas fa-circle-half-stroke fa-fw"></span> Auto
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
