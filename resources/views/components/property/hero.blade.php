@props([
    'subTitle' => null,
    'title' => null,
    'description' => null,
    'image' => null,
])

<div class="position-relative">
    <img draggable="false" loading="lazy" decoding="async"
        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover user-select-none pe-none"
        src="{{ $image }}"
        alt="{{ trans('index.banner') }} - {{ trans('page.home') }} - {{ config('constants.name') }}">

    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

    <div class="position-relative pb-5">
        <div class="container-md">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-7 text-white">
                    <h5>{{ $subTitle }}</h5>
                    <h1 class="fw-bold">{{ $title }}</h1>
                    <p>{!! $description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
