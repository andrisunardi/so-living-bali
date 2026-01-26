<div class="vh-100 position-relative">
    <div class="d-none d-sm-inline d-md-none d-lg-inline">
        <img draggable="false" class="w-100 h-100 object-fit-cover user-select-none pe-none" style="height: 30rem"
            src="{{ $image }}" alt="{{ trans('index.banner') }} - {{ config('constants.name') }}">
    </div>
    <div class="d-inline d-sm-none d-md-inline d-lg-none">
        <img draggable="false" class="w-100 h-100 object-fit-cover user-select-none pe-none" style="height: 30rem"
            src="{{ $image }}" alt="{{ trans('index.banner') }} - {{ config('constants.name') }}">
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6">
                    <div class="lead">{{ $title }}</div>
                    <div class="display-6 fw-bold">{!! $description !!}</div>
                </div>
                <div class="col-md-5 offset-1">
                    <div class="card card-body">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
