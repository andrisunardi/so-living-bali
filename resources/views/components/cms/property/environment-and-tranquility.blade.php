<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="not_directly_exposed_to_main_road">
            {{ trans('property.not_directly_exposed_to_main_road') }}
        </label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="not_directly_exposed_to_main_road"
                name="not_directly_exposed_to_main_road" value="1"
                {{ $form->not_directly_exposed_to_main_road ? 'checked' : '' }}
                wire:model.lazy="form.not_directly_exposed_to_main_road" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->not_directly_exposed_to_main_road ? 'success' : 'danger' }}"
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
            <input class="form-check-input" type="checkbox" role="switch" id="no_festive_venue_nearby"
                name="no_festive_venue_nearby" value="1" {{ $form->no_festive_venue_nearby ? 'checked' : '' }}
                wire:model.lazy="form.no_festive_venue_nearby" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->no_festive_venue_nearby ? 'success' : 'danger' }}"
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
            <input class="form-check-input" type="checkbox" role="switch" id="no_ongoing" name="no_ongoing"
                value="1" {{ $form->no_ongoing ? 'checked' : '' }} wire:model.lazy="form.no_ongoing"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->no_ongoing ? 'success' : 'danger' }}" for="no_ongoing">
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
                name="quiet_access_road" value="1" {{ $form->quiet_access_road ? 'checked' : '' }}
                wire:model.lazy="form.quiet_access_road" wire:offline.class="disabled" wire:offline.attr="disabled"
                wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->quiet_access_road ? 'success' : 'danger' }}"
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
                <div class="form-check form-check-inline" wire:key="orientation-{{ $propertyOrientation->value }}">
                    <input class="form-check-input" type="radio" id="orientation_{{ $propertyOrientation->value }}"
                        name="orientation" value="{{ $propertyOrientation->value }}"
                        {{ $propertyOrientation->value == $form->orientation ? 'checked' : '' }}
                        wire:model.lazy="form.orientation" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="orientation_{{ $propertyOrientation->value }}">
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
            <input type="text" class="form-control" id="view" name="view" minlength="1" maxlength="100"
                placeholder="{{ trans('index.ex') . '. Ocean View' }}" wire:model="form.view"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                wire:loading.attr="disabled">
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
