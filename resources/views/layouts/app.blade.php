<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ app()->getLocale() }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ app()->getLocale() }}" data-bs-theme="auto">

<head>
    <x-meta />

    <title>{{ $title ?? View::getSection('title') }} | {{ config('app.name') }}</title>

    <x-vendors />

    @stack('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="d-flex flex-column min-vh-100 bg-body">
    @if (!View::hasSection('code'))
        @if (Route::is('cms.*'))
            @auth
                @auth
                    <livewire:layouts::cms.header />
                @endauth
            @endauth
        @else
            {{-- <livewire:layouts::header /> --}}
        @endif
    @endif

    <main class="flex-grow-1 @if (!Route::is(['home', 'cms.login', 'cms.forgot-password'])) pt-5 my-4 @endif">
        @if (View::hasSection('code'))
            @if (Request::segment(1) == 'cms')
                <livewire:layouts::cms.error />
            @else
                <livewire:layouts::error />
            @endif
        @else
            @if (Request::segment(1) == 'cms')
                @if (!Route::is(['cms.home', 'cms.login', 'cms.forgot-password']))
                    {{ Breadcrumbs::render() }}
                @endif

                {{ $slot }}
            @else
                @if (!Route::is('home'))
                    {{ Breadcrumbs::render() }}
                @endif

                {{ $slot }}
            @endif
        @endif
    </main>

    @if (!View::hasSection('code'))
        @if (Route::is('cms.*'))
            @auth
                @auth
                    <livewire:layouts::cms.footer />
                @endauth
            @endauth
        @else
            @auth
                {{-- <livewire:layouts::footer /> --}}
            @endauth
        @endif
    @endif

    @if (!Route::is('cms.*'))
        <a draggable="false" href="https://wa.me/{{ config('constants.contact.whatsapp') }}" target="_blank"
            class="position-fixed bottom-0 end-0 m-3 d-flex align-items-center justify-content-center z-1">
            <span class="fa-stack fa-2x">
                <i class="fas fa-circle fa-stack-2x text-success"></i>
                <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
            </span>
        </a>
    @endif

    @if (Route::is('cms.*'))
        <script src="{{ asset('js/color-modes.js') }}"></script>
    @endif

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('script')

    @livewireScripts
</body>

</html>
