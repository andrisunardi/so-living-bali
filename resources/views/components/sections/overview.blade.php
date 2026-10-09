@props(['subTitle', 'title', 'description', 'imageUrl'])

<section class="py-5">
    <div class="container-md py-5">
        <div class="row align-items-center g-4">
            <div class="col-sm-6 col-lg-5">
                <h5>{{ $subTitle }}</h5>
                <h1>{{ $title }}</h1>
                <p class="mt-4 mt-xl-5">{!! $description !!}</p>
            </div>

            <div class="col-sm-6 col-xl-5 offset-lg-1 offset-xl-2">
                <img draggable="false" loading="lazy" decoding="async"
                    class="img-fluid w-100 h-100 rounded user-select-none pe-none" src="{{ $imageUrl }}"
                    alt="{{ trans('index.banner') }} - {{ trans('index.overview') }} - {{ config('constants.meta.title') }}">
            </div>
        </div>
    </div>
</section>
