@section('title', trans('page.property'))
@section('icon', 'fas fa-plus')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.property.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.property_identity') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="name">
                            {{ trans('validation.attributes.name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-building fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. Canggu Villa' }}" required
                                wire:model="form.name" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 50
                        </div>
                        @error('form.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="image">
                            {{ trans('validation.attributes.image') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-building fa-fw "></span>
                            </div>
                            <input type="file" class="form-control" id="image" name="image"
                                accept="image/*,capture=camera,image/jpg,image/jpeg,image/png,image/gif,image/webp"
                                wire:model="form.image" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.format') }} : jpg .jpeg .png .gif .webp,
                            {{ trans('helper.max_size') }} : 12 MB
                        </div>
                        @error('form.image')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror

                        @if ($form->image)
                            <div class="mt-3">
                                <img draggable="false" class="w-100 h-100 rounded user-select-none pe-none"
                                    src="{{ $form->image->temporaryUrl() }}"
                                    alt="{{ trans('index.banner') }} - {{ config('constants.name') }}"
                                    onerror="asset('images/logo.png')">
                            </div>
                        @endif
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="code">
                            {{ trans('property.internal_property_code') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-code fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="code" name="code" minlength="1"
                                maxlength="10" placeholder="{{ trans('index.ex') . '. ABCDE12345' }}" required
                                wire:model="form.code" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 10,
                            {{ trans('helper.unique') }}
                        </div>
                        @error('form.code')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6" wire:ignore>
                        <label class="form-label" for="user_id">
                            {{ trans('property.agent_name') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="user_id" name="user_id" wire:key="form.user_id"
                                wire:model.lazy="user_id" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">{{ trans('index.select') }} {{ trans('page.user') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" wire:key="user-{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.code')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="availability_date">
                            {{ trans('property.availability_date') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-calendar fa-fw "></span>
                            </div>
                            <input type="date" class="form-control" id="availability_date"
                                name="availability_date" min="{{ now()->toDateString() }}" max="2099-12-31"
                                wire:model="form.availability_date" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : {{ trans('index.today') }},
                            {{ trans('helper.max') }} : {{ Date::parse('2099-12-31')->isoFormat('DD MMMM YYYY') }}
                        </div>
                        @error('form.availability_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="visit_date">
                            {{ trans('property.date_of_visit') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-calendar fa-fw "></span>
                            </div>
                            <input type="date" class="form-control" id="visit_date" name="visit_date"
                                min="{{ now()->toDateString() }}" max="2099-12-31" wire:model="form.visit_date"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : {{ trans('index.today') }},
                            {{ trans('helper.max') }} : {{ Date::parse('2099-12-31')->isoFormat('DD MMMM YYYY') }}
                        </div>
                        @error('form.visit_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.property_identity') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="latitude">
                            {{ trans('validation.attributes.latitude') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-globe fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="latitude" name="latitude"
                                min="-90" max="90" step="0.0000001"
                                placeholder="{{ trans('index.ex') . '. -8.6648246' }}" required
                                wire:model="form.latitude" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.latitude')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="longitude">
                            {{ trans('validation.attributes.longitude') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-globe fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="longitude" name="longitude"
                                min="-180" max="180" step="0.0000001"
                                placeholder="{{ trans('index.ex') . '. -8.6648246' }}" required
                                wire:model="form.longitude" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.longitude')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="address">
                            {{ trans('property.address') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-map-location-dot fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="address" name="address" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') . '. Denpasar' }}" required
                                wire:model="form.address" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 200
                        </div>
                        @error('form.address')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="area">
                            {{ trans('property.district_or_area') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-city fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="area" name="area" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. Denpasar' }}" required
                                wire:model="form.area" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 50
                        </div>
                        @error('form.area')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.size_and_surfaces') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="land_size">
                            {{ trans('property.land_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="land_size" name="land_size"
                                min="1" max="999999999" placeholder="{{ trans('index.ex') . '. 100' }}"
                                required wire:model="form.land_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.land_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="building_size">
                            {{ trans('property.building_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="building_size" name="building_size"
                                min="1" max="999999999" placeholder="{{ trans('index.ex') . '. 100' }}"
                                required wire:model="form.building_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.building_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="number_of_floors">
                            {{ trans('property.number_of_floors') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-layer-group fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="number_of_floors" name="number_of_floors"
                                min="1" max="255" placeholder="{{ trans('index.ex') . '. 2' }}" required
                                wire:model="form.number_of_floors" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.number_of_floors')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="outdoor_area_size">
                            {{ trans('property.outdoor_area_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="outdoor_area_size"
                                name="outdoor_area_size" min="1" max="999999999"
                                placeholder="{{ trans('index.ex') . '. 100' }}" required
                                wire:model="form.outdoor_area_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.outdoor_area_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="pool_size">
                            {{ trans('property.pool_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-water-ladder fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="pool_size" name="pool_size"
                                minlength="1" maxlength="50" placeholder="{{ trans('index.ex') . '. 10 x 20' }}"
                                required wire:model="form.pool_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 50
                        </div>
                        @error('form.pool_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.bathrooms_and_layout') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="number_of_bathrooms">
                            {{ trans('property.number_of_bathrooms') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="number_of_bathrooms"
                                name="number_of_bathrooms" min="1" max="999999999"
                                placeholder="{{ trans('index.ex') . '. 100' }}" required
                                wire:model="form.number_of_bathrooms" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.number_of_bathrooms')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="ensuite_bathrooms">
                            {{ trans('property.ensuite_bathrooms') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="ensuite_bathrooms"
                                name="ensuite_bathrooms" value="1"
                                {{ $form->ensuite_bathrooms ? 'checked' : '' }}
                                wire:model.lazy="form.ensuite_bathrooms" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label class="form-check-label text-{{ $form->ensuite_bathrooms ? 'success' : 'danger' }}"
                                for="ensuite_bathrooms">
                                {{ $form->ensuite_bathrooms ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.ensuite_bathrooms')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="guest_toilet">
                            {{ trans('property.guest_toilet') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="guest_toilet"
                                name="guest_toilet" value="1" {{ $form->guest_toilet ? 'checked' : '' }}
                                wire:model.lazy="form.guest_toilet" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label class="form-check-label text-{{ $form->guest_toilet ? 'success' : 'danger' }}"
                                for="guest_toilet">
                                {{ $form->guest_toilet ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.guest_toilet')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="storage">
                            {{ trans('property.storage_or_staff_area') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="storage"
                                name="storage" value="1" {{ $form->storage ? 'checked' : '' }}
                                wire:model.lazy="form.storage" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label class="form-check-label text-{{ $form->storage ? 'success' : 'danger' }}"
                                for="storage">
                                {{ $form->storage ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.storage')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="living_style">
                            {{ trans('property.living_style') }}
                        </label>
                        <div>
                            @foreach ($propertyLivingStyles as $propertyLivingStyle)
                                <div class="form-check form-check-inline"
                                    wire:key="living-style-{{ $propertyLivingStyle->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="living_style_{{ $propertyLivingStyle->value }}" name="living_style"
                                        value="{{ $propertyLivingStyle->value }}"
                                        {{ $propertyLivingStyle->value == $form->living_style ? 'checked' : '' }}
                                        wire:model.lazy="form.living_style" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="living_style_{{ $propertyLivingStyle->value }}">
                                        {{ $propertyLivingStyle->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.living_style')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="outdoor_area_size">
                            {{ trans('property.outdoor_area_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="outdoor_area_size"
                                name="outdoor_area_size" min="1" max="999999999"
                                placeholder="{{ trans('index.ex') . '. 100' }}" required
                                wire:model="form.outdoor_area_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        @error('form.outdoor_area_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="pool_size">
                            {{ trans('property.pool_size') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-water-ladder fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="pool_size" name="pool_size"
                                minlength="1" maxlength="50" placeholder="{{ trans('index.ex') . '. 10 x 20' }}"
                                required wire:model="form.pool_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 50
                        </div>
                        @error('form.pool_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <button type="submit" class="btn btn-primary w-100" wire:click="submit" wire:key="submit"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit">
                                <span class="fas fa-paper-plane fa-fw"></span>
                                {{ trans('index.submit') }}
                            </span>
                            <span wire:loading wire:target="submit" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                {{ trans('index.submit') }}
                            </span>
                        </button>
                    </div>
                    <div class="col-6 col-sm-auto">
                        <button type="button" class="btn btn-warning w-100" wire:click="resetForm"
                            wire:key="resetForm" wire:offline.class="disabled" wire:offline.attr="disabled"
                            wire:loading.class="disabled" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="resetForm">
                                <span class="fas fa-eraser fa-fw"></span>
                                {{ trans('index.reset') }}
                            </span>
                            <span wire:loading wire:target="resetForm" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                {{ trans('index.reset') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $("#user_id").on("change", function() {
            @this.set("form.user_id", $(this).val())
        })

        $("#status").on("change", function() {
            @this.set("form.status", $(this).val())
        })
    </script>
@endpush
