<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="living_area_has_natural_light">
            {{ trans('property.living_area_has_natural_light') }}
        </label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="living_area_has_natural_light"
                name="living_area_has_natural_light" value="1"
                {{ $form->living_area_has_natural_light ? 'checked' : '' }}
                wire:model.lazy="form.living_area_has_natural_light" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->living_area_has_natural_light ? 'success' : 'danger' }}"
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
            <input class="form-check-input" type="checkbox" role="switch" id="bedroom_1_has_natural_light"
                name="bedroom_1_has_natural_light" value="1"
                {{ $form->bedroom_1_has_natural_light ? 'checked' : '' }}
                wire:model.lazy="form.bedroom_1_has_natural_light" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->bedroom_1_has_natural_light ? 'success' : 'danger' }}"
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
            <input class="form-check-input" type="checkbox" role="switch" id="bedroom_2_has_natural_light"
                name="bedroom_2_has_natural_light" value="1"
                {{ $form->bedroom_2_has_natural_light ? 'checked' : '' }}
                wire:model.lazy="form.bedroom_2_has_natural_light" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->bedroom_2_has_natural_light ? 'success' : 'danger' }}"
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
            <input type="text" class="form-control" id="noise_source_identified" name="noise_source_identified"
                minlength="1" maxlength="100"
                placeholder="{{ trans('index.ex') . '. Construction Noise / Road Noise' }}"
                wire:model="form.noise_source_identified" wire:offline.class="disabled" wire:offline.attr="disabled"
                wire:loading.class="disabled" wire:loading.attr="disabled">
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
