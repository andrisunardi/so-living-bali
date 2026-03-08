<?php

use App\Enums\Property\PropertyElectricity;
use App\Enums\Property\PropertyLivingStyle;
use App\Enums\Property\PropertyOrientation;
use App\Enums\Property\PropertyOwnerPriceFlexibility;
use App\Enums\Property\PropertyPowerBackup;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyTargetProfile;
use App\Enums\Property\PropertyWaterSource;
use App\Livewire\Component;
use App\Livewire\Forms\CMS\Property\PropertyEditForm;
use App\Models\Property;
use App\Services\DistrictService;
use App\Services\AreaService;
use App\Services\UserService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;

new #[Title('Edit | Property')] class extends Component {
    public Property $property;

    public PropertyEditForm $form;

    public function mount(Property $property): void
    {
        $this->property = $property;
        $this->form->set(property: $property);
    }

    public function resetForm(): void
    {
        $this->form->set(property: $this->property);
    }

    public function submit(): void
    {
        try {
            $this->form->submit(property: $this->property);

            session()->flash('success', [
                'title' => trans('index.edit') . ' ' . trans('index.success'),
                'message' => trans('page.property') . ' ' . trans('message.has_been_successfully_edited'),
            ]);

            $this->redirect(route('cms.property.index'), navigate: true);
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->all())->implode('<br>');

            $this->alertError(title: trans('index.edit') . ' ' . trans('failed'), body: $errors);
        }
    }

    public function users(): object
    {
        $service = new UserService();
        return $service->index(roleName: 'Agent', isActive: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function districts(): object
    {
        $service = new DistrictService();
        return $service->index(isActive: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function areas(): object
    {
        $service = new AreaService();
        return $service->index(districtId: $this->form->district_id, isActive: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function propertyLivingStyles(): array
    {
        return PropertyLivingStyle::cases();
    }

    public function propertyRentalTypes(): array
    {
        return PropertyRentalType::cases();
    }

    public function propertyOwnerPriceFlexibility(): array
    {
        return PropertyOwnerPriceFlexibility::cases();
    }

    public function propertyOrientations(): array
    {
        return PropertyOrientation::cases();
    }

    public function propertyPowerBackups(): array
    {
        return PropertyPowerBackup::cases();
    }

    public function propertyWaterSources(): array
    {
        return PropertyWaterSource::cases();
    }

    public function propertyElectricities(): array
    {
        return PropertyElectricity::cases();
    }

    public function propertyTargetProfiles(): array
    {
        return PropertyTargetProfile::cases();
    }

    public function propertyStatuses(): array
    {
        return PropertyStatus::cases();
    }
};
?>

@section('title', 'Property')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-success">
            <span class="fas fa-edit fa-fw"></span>
            {{ trans('index.edit') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-success w-100" href="{{ route('cms.property.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <x-alert-error />

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
                            {{ trans('helper.required') }},
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
                            {{ trans('helper.required') }},
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 10,
                            {{ trans('helper.unique') }}
                        </div>
                        @error('form.code')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="user_id">
                            {{ trans('property.agent_name') }}
                        </label>
                        <div class="input-group"ignore>
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            @if (Auth::user()->hasRole('Admin'))
                                <select class="form-select select2" id="user_id" name="user_id"
                                    wire:key="form.user_id" wire:model.lazy="user_id" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                                    <option value="">
                                        {{ trans('index.select') }} {{ trans('validation.attributes.user_id') }}
                                    </option>
                                    @foreach ($this->users() as $user)
                                        <option value="{{ $user->id }}" wire:key="user-{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}"
                                    disabled>
                            @endif
                        </div>
                        @error('form.user_id')
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
                                min="{{ now()->toDateString() }}" max="2099-12-31"
                                @if (!Auth::user()->hasRole('Admin')) disabled @endif wire:model="form.visit_date"
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
                                placeholder="{{ trans('index.ex') . '. -8.6648246' }}" wire:model="form.latitude"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : -90,
                            {{ trans('helper.max') }} : 90
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
                                placeholder="{{ trans('index.ex') . '. -8.6648246' }}" wire:model="form.longitude"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : -180,
                            {{ trans('helper.max') }} : 180
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
                                maxlength="100" placeholder="{{ trans('index.ex') . '. Jalan Raya Canggu I No 1' }}"
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
                        <label class="form-label" for="district_id">
                            {{ trans('validation.attributes.district_id') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-city fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="district_id" name="district_id"
                                wire:key="form.district_id" wire:model.lazy="district_id"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">
                                    {{ trans('index.select') }} {{ trans('validation.attributes.district_id') }}
                                </option>
                                @foreach ($this->districts() as $district)
                                    <option value="{{ $district->id }}" wire:key="district-{{ $district->id }}">
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.district_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="area_id">
                            {{ trans('validation.attributes.area_id') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-archway fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="area_id" name="area_id"
                                wire:key="form.area_id" wire:model.lazy="area_id" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                                <option value="">
                                    {{ trans('index.select') }} {{ trans('validation.attributes.area_id') }}
                                </option>
                                @foreach ($this->areas() as $area)
                                    <option value="{{ $area->id }}" wire:key="area-{{ $area->id }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.area_id')
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
                                wire:model="form.land_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 999999999
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
                                wire:model="form.building_size" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 999999999
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
                                min="1" max="255" placeholder="{{ trans('index.ex') . '. 2' }}"
                                wire:model="form.number_of_floors" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 255
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
                                placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.outdoor_area_size"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 999999999
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
                                wire:model="form.pool_size" wire:offline.class="disabled"
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
                                name="number_of_bathrooms" min="1" max="255"
                                placeholder="{{ trans('index.ex') . '. 2' }}" wire:model="form.number_of_bathrooms"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 255
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
                            <label
                                class="form-check-label text-{{ $form->ensuite_bathrooms ? 'success' : 'danger' }}"
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
                            @foreach ($this->propertyLivingStyles() as $propertyLivingStyle)
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
                                placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.outdoor_area_size"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 999999999
                        </div>
                        @error('form.outdoor_area_size')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.legal_and_basic_eligibility') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="full_legal_documentation">
                            {{ trans('property.full_legal_documentation_available') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="full_legal_documentation" name="full_legal_documentation" value="1"
                                {{ $form->full_legal_documentation ? 'checked' : '' }}
                                wire:model.lazy="form.full_legal_documentation" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->full_legal_documentation ? 'success' : 'danger' }}"
                                for="full_legal_documentation">
                                {{ $form->full_legal_documentation ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.full_legal_documentation')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="fully_furnished">
                            {{ trans('property.fully_furnished') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="fully_furnished"
                                name="fully_furnished" value="1" {{ $form->fully_furnished ? 'checked' : '' }}
                                wire:model.lazy="form.fully_furnished" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label class="form-check-label text-{{ $form->fully_furnished ? 'success' : 'danger' }}"
                                for="fully_furnished">
                                {{ $form->fully_furnished ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.fully_furnished')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="rental_type">
                            {{ trans('property.rental_type_accepted') }}
                        </label>
                        <div>
                            @foreach ($this->propertyRentalTypes() as $propertyRentalType)
                                <div class="form-check form-check-inline"
                                    wire:key="rental-type-{{ $propertyRentalType->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="rental_type_{{ $propertyRentalType->value }}" name="rental_type"
                                        value="{{ $propertyRentalType->value }}"
                                        {{ $propertyRentalType->value == $form->rental_type ? 'checked' : '' }}
                                        wire:model.lazy="form.rental_type" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="rental_type_{{ $propertyRentalType->value }}">
                                        {{ $propertyRentalType->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.rental_type')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="minimum_rental_duration_months">
                            {{ trans('property.minimum_rental_duration_months') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-calendar fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="minimum_rental_duration_months"
                                name="minimum_rental_duration_months" min="1" max="255"
                                placeholder="{{ trans('index.ex') . '. 12' }}"
                                wire:model="form.minimum_rental_duration_months" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 255
                        </div>
                        @error('form.minimum_rental_duration_months')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="owner_price_flexibility">
                            {{ trans('property.owner_price_flexibility') }}
                        </label>
                        <div>
                            @foreach ($this->propertyOwnerPriceFlexibility() as $propertyOwnerPriceFlexibility)
                                <div class="form-check form-check-inline"
                                    wire:key="owner-price-flexbility-{{ $propertyOwnerPriceFlexibility->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="owner_price_flexibility_{{ $propertyOwnerPriceFlexibility->value }}"
                                        name="owner_price_flexibility"
                                        value="{{ $propertyOwnerPriceFlexibility->value }}"
                                        {{ $propertyOwnerPriceFlexibility->value == $form->owner_price_flexibility ? 'checked' : '' }}
                                        wire:model.lazy="form.owner_price_flexibility" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="owner_price_flexibility_{{ $propertyOwnerPriceFlexibility->value }}">
                                        {{ $propertyOwnerPriceFlexibility->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.owner_price_flexibility')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="price_coherent_with_upper">
                            {{ trans('property.price_coherent_with_upper_or_premium_positioning') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="price_coherent_with_upper" name="price_coherent_with_upper" value="1"
                                {{ $form->price_coherent_with_upper ? 'checked' : '' }}
                                wire:model.lazy="form.price_coherent_with_upper" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->price_coherent_with_upper ? 'success' : 'danger' }}"
                                for="price_coherent_with_upper">
                                {{ $form->price_coherent_with_upper ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.price_coherent_with_upper')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.environment_and_tranquility') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="not_directly_exposed_to_main_road">
                            {{ trans('property.not_directly_exposed_to_main_road') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="not_directly_exposed_to_main_road" name="not_directly_exposed_to_main_road"
                                value="1" {{ $form->not_directly_exposed_to_main_road ? 'checked' : '' }}
                                wire:model.lazy="form.not_directly_exposed_to_main_road" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->not_directly_exposed_to_main_road ? 'success' : 'danger' }}"
                                for="not_directly_exposed_to_main_road">
                                {{ $form->not_directly_exposed_to_main_road ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.not_directly_exposed_to_main_road')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="no_festive_venue_nearby">
                            {{ trans('property.no_festive_venue_nearby') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="no_festive_venue_nearby" name="no_festive_venue_nearby" value="1"
                                {{ $form->no_festive_venue_nearby ? 'checked' : '' }}
                                wire:model.lazy="form.no_festive_venue_nearby" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->no_festive_venue_nearby ? 'success' : 'danger' }}"
                                for="no_festive_venue_nearby">
                                {{ $form->no_festive_venue_nearby ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.no_festive_venue_nearby')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="no_ongoing">
                            {{ trans('property.no_ongoing_or_imminent_construction') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="no_ongoing"
                                name="no_ongoing" value="1" {{ $form->no_ongoing ? 'checked' : '' }}
                                wire:model.lazy="form.no_ongoing" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label class="form-check-label text-{{ $form->no_ongoing ? 'success' : 'danger' }}"
                                for="no_ongoing">
                                {{ $form->no_ongoing ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.no_ongoing')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="quiet_access_road">
                            {{ trans('property.quiet_access_road_or_gang') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="quiet_access_road"
                                name="quiet_access_road" value="1"
                                {{ $form->quiet_access_road ? 'checked' : '' }}
                                wire:model.lazy="form.quiet_access_road" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->quiet_access_road ? 'success' : 'danger' }}"
                                for="quiet_access_road">
                                {{ $form->quiet_access_road ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.quiet_access_road')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="orientation">
                            {{ trans('property.orientation') }}
                        </label>
                        <div>
                            @foreach ($this->propertyOrientations() as $propertyOrientation)
                                <div class="form-check form-check-inline"
                                    wire:key="orientation-{{ $propertyOrientation->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="orientation_{{ $propertyOrientation->value }}" name="orientation"
                                        value="{{ $propertyOrientation->value }}"
                                        {{ $propertyOrientation->value == $form->orientation ? 'checked' : '' }}
                                        wire:model.lazy="form.orientation" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="orientation_{{ $propertyOrientation->value }}">
                                        {{ $propertyOrientation->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.orientation')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="view">
                            {{ trans('property.view') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-comment fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="view" name="view" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') . '. Ocean View' }}"
                                wire:model="form.view" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 65.535
                        </div>
                        @error('form.view')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.light_and_acoustics') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="living_area_has_natural_light">
                            {{ trans('property.living_area_has_natural_light') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="living_area_has_natural_light" name="living_area_has_natural_light"
                                value="1" {{ $form->living_area_has_natural_light ? 'checked' : '' }}
                                wire:model.lazy="form.living_area_has_natural_light" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->living_area_has_natural_light ? 'success' : 'danger' }}"
                                for="living_area_has_natural_light">
                                {{ $form->living_area_has_natural_light ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.living_area_has_natural_light')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="bedroom_1_has_natural_light">
                            {{ trans('property.bedroom_1_has_natural_light') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="bedroom_1_has_natural_light" name="bedroom_1_has_natural_light" value="1"
                                {{ $form->bedroom_1_has_natural_light ? 'checked' : '' }}
                                wire:model.lazy="form.bedroom_1_has_natural_light" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->bedroom_1_has_natural_light ? 'success' : 'danger' }}"
                                for="bedroom_1_has_natural_light">
                                {{ $form->bedroom_1_has_natural_light ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.bedroom_1_has_natural_light')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="bedroom_2_has_natural_light">
                            {{ trans('property.bedroom_2_has_natural_light') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="bedroom_2_has_natural_light" name="bedroom_2_has_natural_light" value="1"
                                {{ $form->bedroom_2_has_natural_light ? 'checked' : '' }}
                                wire:model.lazy="form.bedroom_2_has_natural_light" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->bedroom_2_has_natural_light ? 'success' : 'danger' }}"
                                for="bedroom_2_has_natural_light">
                                {{ $form->bedroom_2_has_natural_light ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.bedroom_2_has_natural_light')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="noise_source_identified">
                            {{ trans('property.noise_source_identified') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-comment fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="noise_source_identified"
                                name="noise_source_identified" minlength="1" maxlength="100"
                                placeholder="{{ trans('index.ex') . '. Construction Noise / Road Noise' }}"
                                wire:model="form.noise_source_identified" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 65.535
                        </div>
                        @error('form.noise_source_identified')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.utilities_and_technical') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="internet_speedtest">
                            {{ trans('property.internet_speedtest') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-pen-ruler fa-fw "></span>
                            </div>
                            <input type="number" class="form-control" id="internet_speedtest"
                                name="internet_speedtest" min="1" max="999999999"
                                placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.internet_speedtest"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : 1,
                            {{ trans('helper.max') }} : 999999999
                        </div>
                        @error('form.internet_speedtest')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="power_backup">
                            {{ trans('property.power_backup') }}
                        </label>
                        <div>
                            @foreach ($this->propertyPowerBackups() as $propertyPowerBackup)
                                <div class="form-check form-check-inline"
                                    wire:key="power-backup-{{ $propertyPowerBackup->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="power_backup_{{ $propertyPowerBackup->value }}" name="power_backup"
                                        value="{{ $propertyPowerBackup->value }}"
                                        {{ $propertyPowerBackup->value == $form->power_backup ? 'checked' : '' }}
                                        wire:model.lazy="form.power_backup" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="power_backup_{{ $propertyPowerBackup->value }}">
                                        {{ $propertyPowerBackup->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.power_backup')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="water_source">
                            {{ trans('property.water_source') }}
                        </label>
                        <div>
                            @foreach ($this->propertyWaterSources() as $propertyWaterSource)
                                <div class="form-check form-check-inline"
                                    wire:key="water_source-{{ $propertyWaterSource->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="water_source_{{ $propertyWaterSource->value }}" name="water_source"
                                        value="{{ $propertyWaterSource->value }}"
                                        {{ $propertyWaterSource->value == $form->water_source ? 'checked' : '' }}
                                        wire:model.lazy="form.water_source" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="water_source_{{ $propertyWaterSource->value }}">
                                        {{ $propertyWaterSource->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.water_source')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="electricity">
                            {{ trans('property.electricity') }}
                        </label>
                        <div>
                            @foreach ($this->propertyElectricities() as $propertyElectricity)
                                <div class="form-check form-check-inline"
                                    wire:key="electricity-{{ $propertyElectricity->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="electricity_{{ $propertyElectricity->value }}" name="electricity"
                                        value="{{ $propertyElectricity->value }}"
                                        {{ $propertyElectricity->value == $form->electricity ? 'checked' : '' }}
                                        wire:model.lazy="form.electricity" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="electricity_{{ $propertyElectricity->value }}">
                                        {{ $propertyElectricity->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.electricity')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.design_led_or_instagrammable') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="design_driven_property">
                            {{ trans('property.design_driven_property') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="design_driven_property" name="design_driven_property" value="1"
                                {{ $form->design_driven_property ? 'checked' : '' }}
                                wire:model.lazy="form.design_driven_property" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->design_driven_property ? 'success' : 'danger' }}"
                                for="design_driven_property">
                                {{ $form->design_driven_property ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.design_driven_property')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="usability_limitations">
                            {{ trans('property.usability_limitations_identified') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-comment fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="usability_limitations"
                                name="usability_limitations" minlength="1" maxlength="100"
                                placeholder="{{ trans('index.ex') . '. Construction Noise / Road Noise' }}"
                                wire:model="form.usability_limitations" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 65.535
                        </div>
                        @error('form.usability_limitations')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.trade_off_or_target_profile') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="trade_off_identified">
                            {{ trans('property.trade_off_identified') }}
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="trade_off_identified"
                                name="trade_off_identified" value="1"
                                {{ $form->trade_off_identified ? 'checked' : '' }}
                                wire:model.lazy="form.trade_off_identified" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                            <label
                                class="form-check-label text-{{ $form->trade_off_identified ? 'success' : 'danger' }}"
                                for="trade_off_identified">
                                {{ $form->trade_off_identified ? trans('index.yes') : trans('index.no') }}
                            </label>
                        </div>
                        @error('form.trade_off_identified')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($form->trade_off_identified)
                        <div class="col-sm-6">
                            <label class="form-label" for="trade_off_description">
                                {{ trans('property.if_yes_describe_briefly') }}
                            </label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <span class="fas fa-comment fa-fw "></span>
                                </div>
                                <input type="text" class="form-control" id="trade_off_description"
                                    name="trade_off_description" minlength="1" maxlength="100"
                                    placeholder="{{ trans('index.ex') . '. Limited Parkind / No Pool' }}"
                                    wire:model="form.trade_off_description" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                            </div>
                            <div class="form-text">
                                {{ trans('helper.minlength') }} : 1,
                                {{ trans('helper.maxlength') }} : 65.535
                            </div>
                            @error('form.trade_off_description')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="col-sm-6">
                        <label class="form-label" for="target_profile">
                            {{ trans('property.target_profile') }}
                        </label>
                        <div>
                            @foreach ($this->propertyTargetProfiles() as $propertyTargetProfile)
                                <div class="form-check form-check-inline"
                                    wire:key="target-profile-{{ $propertyTargetProfile->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="target_profile_{{ $propertyTargetProfile->value }}"
                                        name="target_profile" value="{{ $propertyTargetProfile->value }}"
                                        {{ $propertyTargetProfile->value == $form->target_profile ? 'checked' : '' }}
                                        wire:model.lazy="form.target_profile" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label"
                                        for="target_profile_{{ $propertyTargetProfile->value }}">
                                        {{ $propertyTargetProfile->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.target_profile')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label class="form-label" for="status">
                            {{ trans('property.status') }}
                        </label>
                        <div>
                            @foreach ($this->propertyStatuses() as $propertyStatus)
                                <div class="form-check form-check-inline"
                                    wire:key="status-{{ $propertyStatus->value }}">
                                    <input class="form-check-input" type="radio"
                                        id="status_{{ $propertyStatus->value }}" name="status"
                                        value="{{ $propertyStatus->value }}"
                                        {{ $propertyStatus->value == $form->status ? 'checked' : '' }}
                                        wire:model.lazy="form.status" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                    <label class="form-check-label" for="status_{{ $propertyStatus->value }}">
                                        {{ $propertyStatus->description() }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('form.status')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <button type="submit" class="btn btn-success w-100" wire:offline.class="disabled"
                            wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit">
                                <span class="fas fa-save fa-fw"></span>
                                {{ trans('index.save') }}
                            </span>
                            <span wire:loading wire:target="submit" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                {{ trans('index.save') }}
                            </span>
                        </button>
                    </div>
                    <div class="col-6 col-sm-auto">
                        <button type="button" class="btn btn-warning w-100" wire:click="resetForm"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
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

@script
    <script>
        $("#user_id").on("change", function() {
            @this.set("form.user_id", $(this).val())
        })

        $("#district_id").on("change", function() {
            @this.set("form.district_id", $(this).val())
        })

        $("#area_id").on("change", function() {
            @this.set("form.area_id", $(this).val())
        })

        $("#status").on("change", function() {
            @this.set("form.status", $(this).val())
        })
    </script>
@endscript
