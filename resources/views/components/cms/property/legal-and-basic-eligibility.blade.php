<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="full_legal_documentation">
            {{ trans('property.full_legal_documentation_available') }}
        </label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="full_legal_documentation"
                name="full_legal_documentation" value="1" {{ $form->full_legal_documentation ? 'checked' : '' }}
                wire:model.lazy="form.full_legal_documentation" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->full_legal_documentation ? 'success' : 'danger' }}"
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
            <input class="form-check-input" type="checkbox" role="switch" id="fully_furnished" name="fully_furnished"
                value="1" {{ $form->fully_furnished ? 'checked' : '' }} wire:model.lazy="form.fully_furnished"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
                <div class="form-check form-check-inline" wire:key="rental-type-{{ $propertyRentalType->value }}">
                    <input class="form-check-input" type="radio" id="rental_type_{{ $propertyRentalType->value }}"
                        name="rental_type" value="{{ $propertyRentalType->value }}"
                        {{ $propertyRentalType->value == $form->rental_type ? 'checked' : '' }}
                        wire:model.lazy="form.rental_type" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="rental_type_{{ $propertyRentalType->value }}">
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
            {{ trans('property.minimum_rental_duration') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-calendar fa-fw "></span>
            </div>
            <input type="number" class="form-control" id="minimum_rental_duration_months"
                name="minimum_rental_duration_months" min="1" max="255"
                placeholder="{{ trans('index.ex') . '. 12' }}" wire:model="form.minimum_rental_duration_months"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
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
                        name="owner_price_flexibility" value="{{ $propertyOwnerPriceFlexibility->value }}"
                        {{ $propertyOwnerPriceFlexibility->value == $form->owner_price_flexibility ? 'checked' : '' }}
                        wire:model.lazy="form.owner_price_flexibility" wire:offline.class="disabled"
                        wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
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
            <input class="form-check-input" type="checkbox" role="switch" id="price_coherent_with_upper"
                name="price_coherent_with_upper" value="1"
                {{ $form->price_coherent_with_upper ? 'checked' : '' }}
                wire:model.lazy="form.price_coherent_with_upper" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->price_coherent_with_upper ? 'success' : 'danger' }}"
                for="price_coherent_with_upper">
                {{ $form->price_coherent_with_upper ? trans('index.yes') : trans('index.no') }}
            </label>
        </div>
        @error('form.price_coherent_with_upper')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
