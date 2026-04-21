<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="internet_speedtest">
            {{ trans('property.internet_speedtest') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-pen-ruler fa-fw "></span>
            </div>
            <input type="number" class="form-control" id="internet_speedtest" name="internet_speedtest" min="1"
                max="999999999" placeholder="{{ trans('index.ex') . '. 100' }}" wire:model="form.internet_speedtest"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                wire:loading.attr="disabled">
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
        <label class="form-label" for="internet_speedtest_image">
            {{ trans('validation.attributes.internet_speedtest_image') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-image fa-fw "></span>
            </div>
            <input type="file" class="form-control" id="internet_speedtest_image" name="internet_speedtest_image"
                accept="image/*,capture=camera,image/jpg,image/jpeg,image/png,image/gif,image/webp"
                wire:model="form.internet_speedtest_image" wire:offline.class="disabled" wire:offline.attr="disabled"
                wire:loading.class="disabled" wire:loading.attr="disabled">
        </div>
        <div class="form-text">
            {{ trans('helper.format') }} : jpg .jpeg .png .gif .webp,
            {{ trans('helper.max_size') }} : 12 MB
        </div>
        @error('form.internet_speedtest_image')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror

        @if ($form->internet_speedtest_image)
            <div class="mt-3">
                <img draggable="false" class="w-100 h-100 rounded user-select-none pe-none"
                    src="{{ $form->internet_speedtest_image->temporaryUrl() }}"
                    alt="{{ trans('index.image_temporary_url') }} - {{ config('constants.name') }}"
                    onerror="asset('images/logo.png')">
            </div>
        @elseif ($property?->internet_speedtest_image_path)
            <div class="mt-3">
                <a draggable="false" href="{{ $property->internet_speedtest_image }}" target="_blank">
                    <img draggable="false" class="img-fluid w-100 rounded" width="100"
                        src="{{ $property->internet_speedtest_image }}"
                        alt="{{ trans('page.property') }} - {{ $property->id }}"
                        onerror="asset('images/image-not-available.png')" />
                </a>
            </div>
        @endif
    </div>

    <div class="col-sm-6">
        <label class="form-label" for="power_backup">
            {{ trans('property.power_backup') }}
        </label>
        <div>
            @foreach ($this->propertyPowerBackups() as $propertyPowerBackup)
                <div class="form-check form-check-inline" wire:key="power-backup-{{ $propertyPowerBackup->value }}">
                    <input class="form-check-input" type="radio" id="power_backup_{{ $propertyPowerBackup->value }}"
                        name="power_backup" value="{{ $propertyPowerBackup->value }}"
                        {{ $propertyPowerBackup->value == $form->power_backup ? 'checked' : '' }}
                        wire:model.lazy="form.power_backup" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="power_backup_{{ $propertyPowerBackup->value }}">
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
                <div class="form-check form-check-inline" wire:key="water_source-{{ $propertyWaterSource->value }}">
                    <input class="form-check-input" type="radio" id="water_source_{{ $propertyWaterSource->value }}"
                        name="water_source" value="{{ $propertyWaterSource->value }}"
                        {{ $propertyWaterSource->value == $form->water_source ? 'checked' : '' }}
                        wire:model.lazy="form.water_source" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="water_source_{{ $propertyWaterSource->value }}">
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
                <div class="form-check form-check-inline" wire:key="electricity-{{ $propertyElectricity->value }}">
                    <input class="form-check-input" type="radio" id="electricity_{{ $propertyElectricity->value }}"
                        name="electricity" value="{{ $propertyElectricity->value }}"
                        {{ $propertyElectricity->value == $form->electricity ? 'checked' : '' }}
                        wire:model.lazy="form.electricity" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="electricity_{{ $propertyElectricity->value }}">
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
