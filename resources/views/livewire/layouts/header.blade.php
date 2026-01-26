<header id="header" class="fixed-top py-3">
    <div class="container-md">
        <div class="d-flex align-items-center">
            <div class="flex-fill text-start">
                <a draggable="false" href="{{ route('home') }}" wire:navigate>
                    <img draggable="false" class="logo user-select-none pe-none" height="50"
                        src="{{ asset('images/logo.png') }}"
                        alt="{{ trans('index.logo') }} - {{ config('constants.title') }}" />
                </a>
            </div>

            {{-- DESKTOP --}}
            <div class="flex-fill text-center">
                <div class="d-none d-md-flex align-items-center gap-md-3 gap-lg-4 gap-xl-5">
                    @foreach ($navigations as $navigation)
                        <a draggable="false" href="{{ $navigation['url'] }}"
                            class="navbar-color text-white text-uppercase {{ Route::is($navigation['route']) ? 'fw-bold text-decoration-underline link-offset-3' : '' }}"
                            wire:navigate wire:key="navigation-{{ $navigation['id'] }}">
                            {{ $navigation['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex-fill text-end">
                <div class="dropdown">
                    <a draggable="false" href="javascript:;"
                        class="navbar-color text-white text-uppercase dropdown-toggle icon-link"
                        data-bs-toggle="dropdown">
                        <img draggable="false" class="user-select-none pe-none" width="20"
                            src="{{ asset('images/flag/' . app()->getLocale() . '.svg') }}"
                            alt="{{ trans('index.flag') }} - {{ app()->getLocale() }} - {{ config('constants.title') }}" />
                        <span>{{ app()->getLocale() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3">
                        @foreach ($languages as $language)
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
                    <span class="fas fa-bars navbar-color"></span>
                </a>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="navigation">
                    <div class="offcanvas-header d-flex justify-content-between align-items-center border-bottom">
                        <div class="offcanvas-title"></div>
                        <a draggable="false" href="javascript:;" data-bs-dismiss="offcanvas">
                            <span class="fas fa-times text-white"></span>
                        </a>
                    </div>

                    <div class="offcanvas-body">
                        <div class="d-grid gap-4 mt-4">
                            @foreach ($navigations as $navigation)
                                <h2 class="h5 fw-bold mb-0" wire:key="navigation-{{ $navigation['id'] }}">
                                    <a draggable="false" href="{{ $navigation['url'] }}" class="text-white"
                                        wire:navigate>
                                        @if (Route::is($navigation['route']))
                                            <span class="fas fa-caret-right fa-fw"></span>
                                        @endif
                                        <span class="text-uppercase">{{ $navigation['name'] }}</span>
                                    </a>
                                </h2>
                            @endforeach

                            <a draggable="false" class="btn btn-light rounded-5 fw-bold z-1" href="asd"
                                wire:navigate>
                                asd
                            </a>
                        </div>

                        <img draggable="false" width="100"
                            class="position-fixed bottom-0 end-0 img-fluid user-select-none pe-none"
                            src="{{ asset('images/triangle-white-bottom.png') }}"
                            alt="Triangle White Bottom - {{ config('constants.title') }}">
                    </div>
                </div>
            </div>
            {{-- MOBILE --}}
        </div>
    </div>
</header>

@push('script')
    {{-- <script>
        function scroll() {
            const $topbar = $("#topbar");
            const $navbar = $("#navbar");
            const $logo = $(".logo");

            if (!$navbar.length) return;

            function scroll() {
                if ($(window).scrollTop() > 100) {
                    $topbar.addClass("{{ $bgColor }} {{ $textColor }}");
                    $topbar
                        .find(".topbar-color")
                        .removeClass("text-white")
                        .addClass("{{ $textColor }}");

                    $navbar.addClass("{{ $bgColor }}");
                    $navbar
                        .find(".navbar-color")
                        .removeClass("text-white")
                        .addClass("{{ $textColor }}");
                    $navbar
                        .find(".reservation")
                        .removeClass("btn-outline-light")
                        .addClass("{{ $buttonColor }}");

                    $logo.attr("src", "{{ $imageBefore }}");
                } else {
                    $topbar.removeClass("{{ $bgColor }}");
                    $topbar
                        .find(".topbar-color")
                        .removeClass("{{ $textColor }}")
                        .addClass("text-white");

                    $navbar.removeClass("{{ $bgColor }}");
                    $navbar
                        .find(".navbar-color")
                        .removeClass("{{ $textColor }}")
                        .addClass("text-white");
                    $navbar
                        .find(".reservation")
                        .removeClass("{{ $buttonColor }}")
                        .addClass("btn-outline-light");

                    $logo.attr("src", "{{ $imageAfter }}");
                }
            }

            scroll();
            $(window).off("scroll", scroll).on("scroll", scroll);
        }

        document.addEventListener("DOMContentLoaded", scroll);
        document.addEventListener("livewire:navigated", scroll);
    </script> --}}
@endpush
