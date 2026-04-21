<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="land_size">
            {{ trans('property.land_size') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-pen-ruler fa-fw "></span>
            </div>
            <input type="number" class="form-control" id="land_size" name="land_size" min="1" max="999999999"
                placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.land_size"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
            <input type="number" class="form-control" id="building_size" name="building_size" min="1"
                max="999999999" placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.building_size"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
            <input type="number" class="form-control" id="number_of_floors" name="number_of_floors" min="1"
                max="255" placeholder="{{ trans('index.ex') . '. 2' }}" wire:model="form.number_of_floors"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
            <input type="number" class="form-control" id="outdoor_area_size" name="outdoor_area_size" min="1"
                max="999999999" placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.outdoor_area_size"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                wire:loading.attr="disabled">
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
            <input type="text" class="form-control" id="pool_size" name="pool_size" minlength="1" maxlength="50"
                placeholder="{{ trans('index.ex') . '. 10 x 20' }}" wire:model="form.pool_size"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
