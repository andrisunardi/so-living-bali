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
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="lead text-white">{{ $title }}</div>
                    <div class="display-6 fw-bold text-white">{!! $description !!}</div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="card card-body">
                        <h5 class="card-title mb-4">{{ trans('home.form.title') }}</h5>

                        <form wire:submit.prevent="submit" role="form" autocomplete="off">
                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">
                                        <span class="fas fa-location-dot fa-fw"></span>
                                        {{ trans('validation.attributes.area') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" minlength="1" maxlength="50"
                                            placeholder="{{ trans('home.form.area') }}" required wire:model="form.name"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                    </div>
                                    @error('form.name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label">
                                        <span class="fas fa-calendar fa-fw"></span>
                                        {{ trans('validation.attributes.when') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" minlength="1" maxlength="50"
                                            placeholder="{{ trans('home.form.when') }}" required wire:model="form.name"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                    </div>
                                    @error('form.name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label">
                                        <span class="fas fa-bed fa-fw"></span>
                                        {{ trans('validation.attributes.bedrooms') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" minlength="1" maxlength="50"
                                            placeholder="{{ trans('home.form.bedrooms') }}" required wire:model="form.name"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                    </div>
                                    @error('form.name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label">
                                        <span class="fas fa-building fa-fw"></span>
                                        {{ trans('validation.attributes.property_type') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" minlength="1" maxlength="50"
                                            placeholder="{{ trans('home.form.property_type') }}" required wire:model="form.name"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                    </div>
                                    @error('form.name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label">
                                        <span class="fas fa-tags fa-fw"></span>
                                        {{ trans('validation.attributes.price_range') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" minlength="1" maxlength="50"
                                            placeholder="{{ trans('home.form.price_range') }}" required wire:model="form.name"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                    </div>
                                    @error('form.name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100 rounded-5">
                                        {{ trans('home.form.button') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
