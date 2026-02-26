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
                                    class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.home') ? 'active' : '' }}"
                                    href="{{ route('cms.home') }}" wire:navigate>
                                    <span class="fas fa-home fa-fw"></span>
                                    {{ trans('page.home') }}
                                </a>

                                @canany(['contact', 'property', 'article'])
                                    <div class="fw-bold text-uppercase border-bottom pt-2 pb-2">
                                        {{ trans('page.module') }}
                                    </div>
                                @endcanany

                                @can('contact')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.contact.*') ? 'active' : '' }}"
                                        href="{{ route('cms.contact.index') }}" wire:navigate>
                                        <span class="fas fa-phone fa-fw"></span>
                                        {{ trans('page.contact') }}
                                    </a>
                                @endcan

                                @can('property')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.property.*') ? 'active' : '' }}"
                                        href="{{ route('cms.property.index') }}" wire:navigate>
                                        <span class="fas fa-building fa-fw"></span>
                                        {{ trans('page.property') }}
                                    </a>
                                @endcan

                                @can('article')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.article.*') ? 'active' : '' }}"
                                        href="{{ route('cms.article.index') }}" wire:navigate>
                                        <span class="fas fa-newspaper fa-fw"></span>
                                        {{ trans('page.article') }}
                                    </a>
                                @endcan

                                @canany(['area', 'district'])
                                    <div class="fw-bold text-uppercase border-bottom pt-2 pb-2">
                                        {{ trans('page.master') }}
                                    </div>
                                @endcanany

                                @can('area')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.area.*') ? 'active' : '' }}"
                                        href="{{ route('cms.area.index') }}" wire:navigate>
                                        <span class="fas fa-archway fa-fw"></span>
                                        {{ trans('page.area') }}
                                    </a>
                                @endcan

                                @can('district')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.district.*') ? 'active' : '' }}"
                                        href="{{ route('cms.district.index') }}" wire:navigate>
                                        <span class="fas fa-city fa-fw"></span>
                                        {{ trans('page.district') }}
                                    </a>
                                @endcan

                                @canany(['permission', 'role', 'user'])
                                    <div class="fw-bold text-uppercase border-bottom pt-2 pb-2">
                                        {{ trans('page.access') }}
                                    </div>
                                @endcanany

                                @can('permission')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.permission.*') ? 'active' : '' }}"
                                        href="{{ route('cms.permission.index') }}" wire:navigate>
                                        <span class="fas fa-lock-open fa-fw"></span>
                                        {{ trans('page.permission') }}
                                    </a>
                                @endcan

                                @can('role')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.role.*') ? 'active' : '' }}"
                                        href="{{ route('cms.role.index') }}" wire:navigate>
                                        <span class="fas fa-key fa-fw"></span>
                                        {{ trans('page.role') }}
                                    </a>
                                @endcan

                                @can('user')
                                    <a draggable="false"
                                        class="btn btn-outline-primary icon-link w-100 {{ Route::is('cms.user.*') ? 'active' : '' }}"
                                        href="{{ route('cms.user.index') }}" wire:navigate>
                                        <span class="fas fa-user fa-fw"></span>
                                        {{ trans('page.user') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                <a draggable="false" class="navbar-brand" href="{{ route('cms.home') }}" wire:navigate>
                    <span class="d-block d-md-none">CMS</span>
                    <span class="d-none d-md-block">Content Management System</span>
                </a>
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
