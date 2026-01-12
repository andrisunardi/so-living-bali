<nav class="navbar bg-body-tertiary fixed-top border-bottom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center text-truncate">
                <button class="btn me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar">
                    <span class="fas fa-bars fa-fw"></span>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbar">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title">
                            {{ config('app.name') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body">
                        <div class="navbar-nav justify-content-start flex-grow-1">
                            <div class="d-grid gap-3">
                                <a draggable="false"
                                    class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.index') ? 'active' : '' }}"
                                    href="{{ route('cms.index') }}" wire:navigate>
                                    <span class="fas fa-home fa-fw"></span>
                                    {{ trans('page.home') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Route::is('cms.*'))
                    <a draggable="false" class="navbar-brand" href="{{ route('cms.index') }}" wire:navigate>
                        <span class="d-block d-sm-none">CMS</span>
                        <span class="d-none d-sm-block">Content Management System</span>
                    </a>
                @endif
            </div>

            <div class="d-flex gap-2">
                <div>
                    <button type="button" class="btn" wire:click="language">
                        <span class="fas fa-language fa-fw d-none d-sm-inline me-2"></span>
                        <span class="text-uppercase">
                            {{ session()->get('locale') ?? 'en' }}
                        </span>
                    </button>
                </div>
                <div>
                    <button type="button" class="btn" wire:click="theme">
                        <span class="fas fa-circle-half-stroke theme-icon" wire:ignore></span>
                        <span class="d-none d-sm-inline ms-2 text-capitalize theme-name" wire:ignore></span>
                    </button>
                </div>
                <div>
                    <button type="button" class="btn" wire:click="account">
                        <span class="fas fa-user fa-fw"></span>
                        <span class="d-none d-sm-inline ms-2">{{ auth()->user()->name }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
