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

<body class="m-0">
    <div class="vh-100 overflow-hidden">
        <img src="{{ asset('images/banner.png') }}" class="w-100 h-100 object-fit-cover" alt="Banner">
    </div>
</body>

</html>
