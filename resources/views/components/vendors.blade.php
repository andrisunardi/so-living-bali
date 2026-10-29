@include('vendors.jquery')

@include('vendors.autonumeric')

@include('vendors.bootstrap')

{{-- @include('vendors.canvas2image') --}} {{-- unused: no canvas2image usage anywhere --}}

{{-- @include('vendors.clarity-microsoft-tag') --}}

@include('vendors.flag-icons')

@include('vendors.font-awesome')

{{-- @include('vendors.html5-qrcode') --}} {{-- unused: no QR scanner markup anywhere --}}

@include('vendors.leaflet')

{{-- @include('vendors.lozad') --}} {{-- unused: images use native loading="lazy", no data-lozad targets --}}

@include('vendors.nouislider')

@include('vendors.pace')

@include('vendors.sweetalert2')

{{-- @include('vendors.swiper') --}} {{-- unused: no .swiper / new Swiper anywhere --}}

{{-- @include('vendors.tom-select') --}}

@include('vendors.snowflakes')

{{-- CMS-only vendors: heavy editors/pickers/selects not used on the public site. --}}
@if (Route::is('cms.*'))
    @include('vendors.flatpickr')

    @include('vendors.select2')

    @include('vendors.tinymce')

    @include('vendors.trix')
@endif
