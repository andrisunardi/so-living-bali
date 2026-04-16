<?php

use App\Livewire\Component;

new class extends Component {
    public function navigations(): array
    {
        return [
            [
                'id' => 1,
                'name' => trans('page.home'),
                'url' => route('home'),
                'route' => 'home',
                'is_active' => true,
            ],
            [
                'id' => 2,
                'name' => trans('page.service'),
                'url' => route('about'),
                'route' => 'about',
                'is_active' => true,
            ],
            [
                'id' => 3,
                'name' => trans('page.about'),
                'url' => route('about'),
                'route' => 'about',
                'is_active' => true,
            ],
            [
                'id' => 4,
                'name' => trans('page.article'),
                'url' => route('article'),
                'route' => 'article',
                'is_active' => true,
            ],
            [
                'id' => 6,
                'name' => trans('page.contact'),
                'url' => route('contact'),
                'route' => 'contact',
                'is_active' => true,
            ],
        ];
    }

    public function languages(): array
    {
        return [
            [
                'id' => 1,
                'code' => 'en',
                'name' => 'English',
                'image_url' => asset('images/flag/en.svg'),
            ],
            [
                'id' => 2,
                'code' => 'id',
                'name' => 'Indonesia',
                'image_url' => asset('images/flag/id.svg'),
            ],
            [
                'id' => 3,
                'code' => 'zh',
                'name' => 'Chinese',
                'image_url' => asset('images/flag/zh.svg'),
            ],
        ];
    }
};
?>

<header id="header" class="fixed-top py-3">
    <div class="container-md">
        <div class="d-flex align-items-center">
            <div class="flex-fill text-start">
                <a draggable="false" href="{{ route('home') }}" wire:navigate>
                    <img draggable="false" class="logo user-select-none pe-none" height="50"
                        src="{{ asset('images/logo.png') }}"
                        alt="{{ trans('index.logo') }} - {{ config('app.name') }}" />
                </a>
            </div>

            {{-- DESKTOP --}}
            <div class="flex-fill text-center">
                <div class="d-none d-md-flex align-items-center gap-md-3 gap-lg-4 gap-xl-5">
                    @foreach ($this->navigations() as $navigation)
                        <a draggable="false" href="{{ $navigation['url'] }}"
                            class="header-color text-white text-uppercase {{ Route::is($navigation['route']) ? 'fw-bold text-decoration-underline link-offset-3' : '' }}"
                            wire:navigate wire:key="navigation-{{ $navigation['id'] }}">
                            {{ $navigation['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex-fill text-end">
                <div class="dropdown">
                    <a draggable="false" href="javascript:;"
                        class="header-color text-white text-uppercase dropdown-toggle icon-link"
                        data-bs-toggle="dropdown">
                        <img draggable="false" class="user-select-none pe-none" width="20"
                            src="{{ asset('images/flag/' . app()->getLocale() . '.svg') }}"
                            alt="{{ trans('index.flag') }} - {{ app()->getLocale() }} - {{ config('constants.title') }}" />
                        <span>{{ app()->getLocale() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3">
                        @foreach ($this->languages() as $language)
                            <li wire:key="language-{{ $language['id'] }}">
                                <a draggable="false" class="dropdown-item icon-link"
                                    href="{{ route('locale', ['locale' => $language['code']]) }}">
                                    <img draggable="false" class="user-select-none pe-none" width="20"
                                        src="{{ $language['image_url'] }}"
                                        alt="{{ trans('index.flag') }} {{ $language['code'] }} - {{ config('constants.title') }}" />
                                    <span>{{ $language['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- DESKTOP --}}

            {{-- MOBILE --}}
            <div class="d-flex gap-4 d-lg-none">
                <a draggable="false" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#navigation">
                    <span class="fas fa-bars header-color"></span>
                </a>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="navigation">
                    <div class="offcanvas-header">
                        <div class="offcanvas-title">
                            <a draggable="false" href="{{ route('home') }}" wire:navigate>
                                <img draggable="false" class="user-select-none pe-none" height="50"
                                    src="{{ asset('images/logo/black-tagline.png') }}"
                                    alt="{{ trans('index.logo') }} - {{ config('app.name') }}" />
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body">
                        <div class="d-grid gap-4">
                            <ul class="list-unstyled d-grid gap-4">
                                @foreach ($this->navigations() as $navigation)
                                    <li wire:key="navigation-{{ $navigation['id'] }}">
                                        <a draggable="false" href="{{ $navigation['url'] }}" wire:navigate
                                            class="d-flex justify-content-between text-body fs-6 {{ Route::is($navigation['route']) ? 'fw-bold' : '' }}">
                                            <span>{{ $navigation['name'] }}</span>
                                            <span class="fas fa-angle-right fa-fw"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <a draggable="false" class="btn btn-dark rounded-5 fw-bold w-100"
                                href="{{ route('home') }}" wire:navigate>
                                <span class="fas fa-arrow-right-to-bracket fa-fw"></span>
                                {{ trans('index.login') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- MOBILE --}}
        </div>
    </div>
</header>

@push('script')
    <script>
        function scroll() {
            const $header = $("#header");
            const $logo = $(".logo");

            if (!$header.length) return;

            function scroll() {
                if ($(window).scrollTop() > 100) {
                    $header.addClass("bg-white text-black");
                    $header
                        .find(".header-color")
                        .removeClass("text-white")
                        .addClass("text-black");

                    $header.addClass("bg-white");
                    $header
                        .find(".header-color")
                        .removeClass("text-white")
                        .addClass("text-black");

                    $logo.attr("src", "{{ asset('images/logo/black.png') }}");
                } else {
                    $header.removeClass("bg-white");
                    $header
                        .find(".header-color")
                        .removeClass("text-black")
                        .addClass("text-white");

                    $header.removeClass("bg-WHITE");
                    $header
                        .find(".header-color")
                        .removeClass("text-black")
                        .addClass("text-white");

                    $logo.attr("src", "{{ asset('images/logo/white.png') }}");
                }
            }

            scroll();
            $(window).off("scroll", scroll).on("scroll", scroll);
        }

        document.addEventListener("DOMContentLoaded", scroll);
        document.addEventListener("livewire:navigated", scroll);
    </script>
@endpush
