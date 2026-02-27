<div class="container d-flex justify-content-center align-items-center text-center vh-100">
    <div>
        <img draggable="false" class="logo" width="100" src="{{ asset('images/logo.png') }}"
            alt="{{ trans('field.logo') }} - {{ config('app.name') }}" onerror="asset('images/logo.png')" />

        <h1 class="mt-5">@yield('code')</h1>
        <h3>@yield('message')</h3>
        <p class="lead">@yield('description')</p>

        <div>
            <a draggable="false" class="btn btn-primary"
                href="{{ url()->previous() == url()->current() ? route('home') : url()->previous() }}">
                <span class="fas fa-arrow-left fa-fw"></span>
                {{ trans('index.back_to') }} {{ trans('page.previous_page') }}
            </a>
        </div>

        <div class="small mt-5">
            <small>
                &copy; {{ trans('footer.copyright') }} {{ now()->year }} &reg;
                <strong>{{ config('app.name') }}</strong>&trade;
                <br class="d-block d-sm-none" />
                {{ trans('footer.all_rights_reserved') }}.
            </small>
        </div>
    </div>
</div>
