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
                    <select class="form-select tags" data-placeholder="{{ trans('home.form.area') }}" multiple
                        wire:model="form.area" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                        <optgroup label="Tibubeneng">
                            <option value="Canggu" data-description="Tibubeneng" selected>
                                Canggu
                            </option>
                            <option value="Seminyak" data-description="Tibubeneng">
                                Seminyak
                            </option>
                        </optgroup>
                    </select>
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
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
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
                    <select class="form-select" id="bedrooms" name="bedrooms"
                        placeholder="{{ trans('home.form.bedrooms') }}" required wire:model="form.bedrooms"
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                        <option class="">
                            {{ trans('index.all') }} {{ trans('field.type') }}
                        </option>
                        @foreach ($propertyTypes as $propertyType)
                            <option value="{{ $propertyType->value }}" wire:key="property-type-{{ $propertyType }}">
                                {{ $propertyType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('form.bedrooms')
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
                    <select class="form-select" id="property_type" name="property_type"
                        placeholder="{{ trans('home.form.property_type') }}" required wire:model="form.property_type"
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                        <option class="">
                            {{ trans('index.all') }} {{ trans('field.type') }}
                        </option>
                        @foreach ($propertyTypes as $propertyType)
                            <option value="{{ $propertyType->value }}" wire:key="property-type-{{ $propertyType }}">
                                {{ $propertyType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('form.property_type')
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
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                </div>
                @error('form.price_range')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success w-100 rounded-5">
                    <span class="fas fa-search fa-fw"></span>
                    {{ trans('home.form.button') }}
                </button>
            </div>
        </div>
    </form>
</div>
