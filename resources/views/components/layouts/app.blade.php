<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ app()->getLocale() }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ app()->getLocale() }}" data-bs-theme="auto">

<head>
    <x-layouts.meta />

    <title>
        @if (!Route::is('home') && !Route::is('cms.home'))
            @yield('title') |
        @endif
        @if (Route::is('cms.*'))
            CMS |
        @endif
        {{ config('app.name') }}
    </title>

    <x-layouts.vendors />

    @stack('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    @if (View::getSection('code') != 503)
        @if (Route::is('cms.*'))
            @auth
                @livewire('c-m-s.layouts.header')
            @endauth
        @else
            {{-- @livewire('layouts.header') --}}
        @endif
    @endif

    <main class="flex-grow-1 @if (!Route::is(['cms.login', 'cms.forgot-password'])) pt-5 my-4 @endif">
        @if (View::hasSection('code'))
            @if (Route::is('cms.*'))
                {{-- @livewire('layouts.c-m-s.error') --}}
            @else
                {{-- @livewire('layouts.error') --}}
            @endif
        @else
            @if (!Route::is(['home', 'cms.home', 'cms.login', 'cms.forgot-password']))
                {{ Breadcrumbs::render() }}
            @endif

            {{ $slot }}
        @endif
    </main>

    @if (View::getSection('code') != 503)
        @if (Route::is('cms.*'))
            @livewire('c-m-s.layouts.footer')
        @else
            {{-- @livewire('layouts.footer') --}}
        @endif
    @endif

    @if (Route::is('cms.*'))
        @auth
            {{-- @livewire('modal.modal-logs') --}}

            @livewire('modal.modal-language')

            @livewire('modal.modal-theme')

            {{-- @livewire('modal.modal-account') --}}
        @endauth
    @endif

    <script>
        document.addEventListener('livewire:navigated', () => {
            Livewire.on('openModalLanguage', () => {
                $('#modal-language').modal('show');
            });

            Livewire.on('closeModalLanguage', () => {
                $('#modal-language').modal('hide');
            });

            Livewire.on('openModalTheme', () => {
                $('#modal-theme').modal('show');
            });

            Livewire.on('closeModalTheme', () => {
                $('#modal-theme').modal('hide');
            });
        });
    </script>

    <script src="{{ asset('js/color-modes.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('script')
</body>

</html>
